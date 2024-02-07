<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancellationPostRequest;
use App\Mail\CancellationEmail;
use App\Models\Client;
use App\Models\Email;
use App\Models\Invoice;
use App\Models\InvoiceType;
use App\Models\OperationType;
use App\Models\Partner;
use App\Models\RefundOperation;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;


class RefundOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $invoiceTypes = InvoiceType::all('id', 'name');
        $operationTypes = OperationType::select('id', 'name')->orderBy('name', 'desc')->get();

        return Inertia::render('Form/Cancellation', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'invoiceTypes' => $invoiceTypes,
            'operationTypes' => $operationTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CancellationPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $partner = Partner::firstOrCreate(['name' => $validated['partner_name']]);

        $invoiceType = InvoiceType::where('name', $validated['invoice_type'])->first();

        $client = Client::firstOrCreate(['name' => $validated['client']]);

        DB::beginTransaction();

        $oldInvoice = Invoice::firstOrCreate(
            ['name' => $validated['old_invoice']],
            [
                'name' => $validated['old_invoice'],
                'invoice_type_id' => $invoiceType->id,
                'invoice_date' => $validated['old_invoice_date'],
                'client_id' => $client->id,
                'total_price_amount' => $validated['old_price'],
                'material' => $validated['old_material'],
            ]
        );

        $includeNewInvoice = $validated['operation_type'] != 'cancelación' || $validated['is_include_selected'];
        if ($includeNewInvoice) {
            $newInvoice = Invoice::firstOrCreate(
                ['name' => $validated['new_invoice']],
                [
                    'name' => $validated['new_invoice'],
                    'invoice_type_id' => $invoiceType->id,
                    'invoice_date' => $validated['new_invoice_date'],
                    'client_id' => $client->id,
                    'total_price_amount' => $validated['new_price'],
                    'material' => $validated['new_material'],
                ]
            );
        }

        $operationType = OperationType::where('name', $validated['operation_type'])->first();

        $refundOperation = new RefundOperation([
            'partner_id' => $partner->id,
            'old_invoice_id' => $oldInvoice->id,
            'new_invoice_id' => $includeNewInvoice ? $newInvoice->id : null,
            'reason' => $validated['reason'],
            'authorized_by' => $validated['authorized_by'],
            'operation_type_id' => $operationType->id,
        ]);

        $operationStatus = $this->sendEmails($refundOperation);

        if ($operationStatus == 'success') {
            $refundOperation->save();
            DB::commit();
            
            return to_route('refundOperation.index');
        }

        DB::rollBack();

        return to_route('refundOperation.index')->withErrors(['email_state' => $operationStatus]);
    }

    /**
     * Send emails to the required contacts. Returns if the process was successful or not.
     */
    private function sendEmails(RefundOperation $refundOperation): string
    {
        $emails = Email::all('name')->pluck('name');

        try {
            Mail::to($emails)->send(new CancellationEmail($refundOperation));
        } catch (Exception $e) {
            return 'Ha ocurrido un error al enviar el correo. Intentelo de nuevo.';
        }

        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(RefundOperation $refundOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RefundOperation $refundOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefundOperation $refundOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RefundOperation $refundOperation)
    {
        //
    }
}
