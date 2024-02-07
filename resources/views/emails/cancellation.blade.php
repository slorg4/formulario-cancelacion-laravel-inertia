<!DOCTYPE html>
<html lang="es" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
  <meta charset="utf-8">
  <meta name="x-apple-disable-message-reformatting">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
  <meta name="color-scheme" content="light dark">
  <meta name="supported-color-schemes" content="light dark">
</head>

<body style="margin: 0; width: 100%; padding: 0; -webkit-font-smoothing: antialiased; word-break: break-word">
  <div role="article" aria-roledescription="email" aria-label lang="en">
    <div style="font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif">
      <div style="margin-left: auto; margin-right: auto; width: 60%; padding-top: 40px; padding-bottom: 40px">
        <div
          style="display: block; border-radius: 6px; background-color: #f8fafc; padding: 40px; border: 3px solid rgba(25, 39, 97, 0.9)">
          <h1 style="text-align: center; font-size: 30px; font-weight: 700">Excelente día</h1>
          <div id="invoice-section" style="display: block;">
            <h3 style="margin-bottom: 8px; margin-top: 0; font-size: 18px">
              {{ $refundOperation->partner->name }} quiere solicitar la
              {{ $refundOperation->operationType->name }} de la siguiente
              {{ $refundOperation->oldInvoice->invoiceType->name }}:
            </h3>
            <div id="invoice-container"
              style="border-radius: 8px; background-color: #fff; font-size: 18px; border: 3px solid rgba(199, 14, 1, 0.9)">
              <div style="padding: 12px">
                <div style="margin-bottom: 4px">
                  <p style="margin: 0; font-weight: 700;">
                    {{ Str::ucfirst($refundOperation->oldInvoice->invoiceType->name) }} con folio: <span
                      style="font-weight: 400">{{ $refundOperation->oldInvoice->name }}</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Fecha: <span style="font-weight: 400;">{{ $refundOperation->oldInvoice->invoice_date }}</span>
                  </p>
                </div>
                <p style="margin: 0 0 4px; font-weight: 700;">
                  Monto original: <span
                    style="font-weight: 400;">{{ '$' . number_format($refundOperation->oldInvoice->total_price_amount, 2) }}</span>
                </p>
                <p style="margin: 0 0 4px; font-weight: 700;">
                  Nombre del cliente: <span
                    style="font-weight: 400;">{{ $refundOperation->oldInvoice->client->name }}</span>
                </p>
                <div>
                  <p style="margin: 0; font-weight: 700;">Material a cambiar:</p>
                  <p style="margin: 0;">{!! nl2br($refundOperation->oldInvoice->material) !!}</p>
                </div>
              </div>
            </div>
            @if ($refundOperation->new_invoice_id)
              <h3 style="margin-bottom: 8px; margin-top: 20px; font-size: 18px">
                Cambiandolo por lo siguiente:
              </h3>
              <div id="invoice-container"
                style="border-radius: 8px; background-color: #fff; font-size: 18px; border: 3px solid rgba(199, 14, 1, 0.9);">
                <div style="padding: 12px;">
                  <div style="margin-bottom: 4px;">
                    <p style="margin: 0; font-weight: 700;">
                      {{ Str::ucfirst($refundOperation->oldInvoice->invoiceType->name) }} con folio: <span
                        style="font-weight: 400;">{{ $refundOperation->newInvoice->name }}</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      Fecha: <span style="font-weight: 400;">{{ $refundOperation->newInvoice->invoice_date }}</span>
                    </p>
                  </div>
                  <p style="margin: 0 0 4px; font-weight: 700;">
                    Monto final: <span
                      style="font-weight: 400;">{{ '$' . number_format($refundOperation->newInvoice->total_price_amount, 2) }}</span>
                  </p>
                  <div>
                    <p style="margin: 0; font-weight: 700;">Material a cambiar:</p>
                    <p style="margin: 0;">{!! nl2br($refundOperation->newInvoice->material) !!}</p>
                  </div>
                </div>
              </div>
            @endif
            <p style="margin: 16px 0 0; font-size: 18px; font-weight: 700; font-style: italic">
              Con motivo: <span style="font-weight: 400;">{{ $refundOperation->reason }}</span>
            </p>
            <p style="margin: 0; font-size: 18px; font-weight: 700; font-style: italic;">
              Autorizado por: <span style="font-weight: 400;">{{ $refundOperation->authorized_by }}</span>
            </p>
          </div>
          <p style="margin: 40px 0 12px; text-align: center; font-weight: 700; font-style: italic">
            *Correo generado automáticamente por programa de devoluciones*
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
