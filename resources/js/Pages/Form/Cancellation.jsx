import React from "react";
import CancellationForm from "./Partials/CancellationForm";
import MCVentasLayout from "@/Layouts/MCVentasLayout";
import { Head } from "@inertiajs/react";

function Cancellation({ operationTypes, invoiceTypes }) {
  return (
    <>
      <Head title="Formulario" />
      <MCVentasLayout>
        <div className="container mx-auto">
          <CancellationForm
            operationTypes={operationTypes}
            invoiceTypes={invoiceTypes}
          />
        </div>
      </MCVentasLayout>
    </>
  );
}

export default Cancellation;
