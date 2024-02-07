import "@/../css/containers.css";
import "@/../css/cancellation-form.css";

import {
  Button,
  Radio,
  RadioGroup,
  Select,
  SelectItem,
  Switch,
} from "@nextui-org/react";
import dayjs from "dayjs";
import React, { useRef, useState } from "react";
import MCInputForm from "@/Components/MCInputForm";
import MCInputDateForm from "@/Components/MCInputDateForm";
import { useForm } from "@inertiajs/react";
import toast from "react-hot-toast";

function CancellationForm({ operationTypes, invoiceTypes }) {
  const {
    data,
    setData,
    post,
    processing,
    reset,
    transform,
    errors,
    setError,
  } = useForm({
    partner_name: "",
    invoice_type: invoiceTypes[0].name,
    operation_type: operationTypes[0].name,
    old_invoice: "",
    old_invoice_date: dayjs(),
    old_material: "",
    old_price: "",
    client: "",
    new_invoice: "",
    new_invoice_date: dayjs(),
    new_material: "",
    new_price: "",
    reason: "",
    authorized_by: "",
    emails_state: "",
    is_include_selected: false,
  });

  transform((data) => ({
    ...data,
    old_invoice_date: data.old_invoice_date.format("DD-MM-YYYY").toString(),
    new_invoice_date: data.new_invoice_date.format("DD-MM-YYYY").toString(),
    old_price: parseFloat(data.old_price).toFixed(2),
    new_price:
      data.operation_type !== "cancelación"
        ? parseFloat(data.new_price).toFixed(2)
        : !data.is_include_selected
        ? ""
        : parseFloat(data.new_price).toFixed(2),
    new_invoice:
      data.operation_type !== "cancelación"
        ? data.new_invoice
        : !data.is_include_selected
        ? ""
        : data.new_invoice,
    new_material:
      data.operation_type !== "cancelación"
        ? data.new_material
        : !data.is_include_selected
        ? ""
        : data.new_material,
  }));

  const oldInvoiceInputs = [
    {
      description: "Folio",
      value: data.old_invoice,
      setValue: (value) => setData("old_invoice", value),
      type: "number",
      isCancellable: false,
      dateValue: data.old_invoice_date,
      setDateValue: (value) => setData("old_invoice_date", value),
      errors: errors.old_invoice,
      setError: (value) => setError("old_invoice", value),
    },
    {
      description: "Monto Original",
      value: data.old_price,
      setValue: (value) => setData("old_price", value),
      type: "number",
      isCancellable: false,
      isMoney: true,
      errors: errors.old_price,
      setError: (value) => setError("old_price", value),
    },
    {
      description: "Material que se cambia",
      value: data.old_material,
      setValue: (value) => setData("old_material", value),
      type: "textarea",
      isCancellable: false,
      errors: errors.old_material,
      setError: (value) => setError("old_material", value),
    },
    {
      description: "Nombre del Cliente",
      value: data.client,
      setValue: (value) => setData("client", value),
      type: "text",
      isCancellable: false,
      errors: errors.client,
      setError: (value) => setError("client", value),
    },
  ];
  const newInvoiceInputs = [
    {
      description: "Folio",
      value: data.new_invoice,
      setValue: (value) => setData("new_invoice", value),
      type: "number",
      isCancellable: true,
      dateValue: data.new_invoice_date,
      setDateValue: (value) => setData("new_invoice_date", value),
      errors: errors.new_invoice,
      setError: (value) => setError("new_invoice", value),
    },
    {
      description: "Monto Final",
      value: data.new_price,
      setValue: (value) => setData("new_price", value),
      type: "number",
      isCancellable: true,
      isMoney: true,
      errors: errors.new_price,
      setError: (value) => setError("new_price", value),
    },
    {
      description: "Material que se sustituye",
      value: data.new_material,
      setValue: (value) => setData("new_material", value),
      type: "textarea",
      isCancellable: true,
      errors: errors.new_material,
      setError: (value) => setError("new_material", value),
    },
    {
      description: "Motivo del cambio",
      value: data.reason,
      setValue: (value) => setData("reason", value),
      type: "text",
      isCancellable: false,
      errors: errors.reason,
      setError: (value) => setError("reason", value),
    },
    {
      description: "Autorizado por",
      value: data.authorized_by,
      setValue: (value) => setData("authorized_by", value),
      type: "text",
      isCancellable: false,
      errors: errors.authorized_by,
      setError: (value) => setError("authorized_by", value),
    },
  ];

  const invoiceTitle =
    data.invoice_type[0].toUpperCase() + data.invoice_type.slice(1);

  const [toggleRequired, setToggleRequired] = useState(
    operationTypes[0].name !== "cancelación"
  );

  const selectRef = useRef(null);

  function handleSubmit(e) {
    e.preventDefault();

    post("/", {
      preserveState: (page) => Object.keys(page.props.errors).length > 0,
      onSuccess: () => {
        reset();
        toast.success(`La ${data.invoice_type} se envió correctamente.`);
      },
      onError: (errors) => handleErrors(errors),
    });
  }

  function handleErrors(errors) {
    //console.log(errors);
    if (errors.email_state) {
      toast.error(errors.email_state);
    } else {
      toast.error("Error de formato. Revise los campos");
    }
  }

  function toggleCancelFormat() {
    if (!toggleRequired) {
      return;
    }
    setData((prevData) => ({
      ...prevData,
      old_invoice_date: dayjs(),
      new_invoice_date: dayjs(),
    }));
    setToggleRequired(false);
  }

  function untoggleCancelFormat() {
    if (toggleRequired) {
      return;
    }
    setToggleRequired(true);
  }

  function handleSelectOnChange(e) {
    setData("operation_type", e.target.value);
    setError("operation_type", "");

    if (e.target.value === "cancelación") {
      toggleCancelFormat();
    } else {
      untoggleCancelFormat();
    }
  }

  return (
    <form onSubmit={handleSubmit} className="flex flex-col p-8 lg:mx-32">
      <div className="bg-tables p-3 sm:p-10">
        <h2 className="text-2xl sm:text-4xl text-center font-bold">
          Devoluciones y Cancelaciones
        </h2>
        <div className="input-wrapper flex flex-col items-center gap-4 mt-6">
          <MCInputForm
            label="Ingrese su Nombre"
            value={data.partner_name}
            setValue={(value) => setData("partner_name", value)}
            type="text"
            isRequired
          />

          <div className="flex flex-col sm:flex-row justify-between gap-2 w-full">
            <RadioGroup
              orientation="horizontal"
              defaultValue={data.invoice_type}
              className="justify-center"
            >
              {invoiceTypes.map((invoiceType) => (
                <Radio
                  key={invoiceType.id}
                  value={invoiceType.name}
                  classNames={{
                    label: "text-base sm:text-xl",
                  }}
                  onChange={(e) => setData("invoice_type", e.target.value)}
                >
                  {invoiceType.name.toUpperCase()}
                </Radio>
              ))}
            </RadioGroup>
            <Select
              aria-label="Tipo de Devolución/Cancelación"
              label="Seleccione una opción"
              defaultSelectedKeys={[data.operation_type]}
              errorMessage={errors.operation_type}
              isInvalid={errors.operation_type}
              color={errors.operation_type ? "danger" : "default"}
              className="sm:w-3/5"
              classNames={{
                trigger: "border-solid border-1 border-zinc-500",
                value: "text-sm sm:text-lg",
              }}
              onChange={handleSelectOnChange}
              ref={selectRef}
            >
              {operationTypes.map((operationType) => (
                <SelectItem key={operationType.name} value={operationType.name}>
                  {operationType.name.toUpperCase()}
                </SelectItem>
              ))}
            </Select>
          </div>

          <p className="font-bold text-xl sm:text-2xl self-start">{`${invoiceTitle} a cancelar`}</p>
          {oldInvoiceInputs.map((invoiceInput, index) =>
            invoiceInput.dateValue ? (
              <MCInputDateForm
                key={`${index}-${invoiceInput.description}`}
                {...invoiceInput}
                label={invoiceInput.description}
                isRequired={!(!toggleRequired && invoiceInput.isCancellable)}
                isDateReadonly={!toggleRequired}
                isInvalid={invoiceInput.errors}
                errorMessage={invoiceInput.errors}
                color={invoiceInput.errors ? "danger" : "default"}
              />
            ) : (
              <MCInputForm
                key={`${index}-${invoiceInput.description}`}
                {...invoiceInput}
                label={invoiceInput.description}
                isRequired={!(!toggleRequired && invoiceInput.isCancellable)}
                isInvalid={invoiceInput.errors}
                errorMessage={invoiceInput.errors}
                color={invoiceInput.errors ? "danger" : "default"}
              />
            )
          )}

          <div className="w-full flex-col">
            <p className="font-bold text-xl sm:text-2xl self-start">{`${invoiceTitle} que la sustituye`}</p>
            {data.operation_type === "cancelación" && (
              <Switch
                isSelected={data.is_include_selected}
                onValueChange={() =>
                  setData("is_include_selected", !data.is_include_selected)
                }
                className="italic font-bold"
                size="sm"
              >
                *Incluir datos
              </Switch>
            )}
          </div>
          {newInvoiceInputs.map((invoiceInput, index) =>
            invoiceInput.dateValue ? (
              <MCInputDateForm
                key={`${index}-${invoiceInput.description}`}
                {...invoiceInput}
                label={invoiceInput.description}
                isRequired={
                  !(
                    !toggleRequired &&
                    invoiceInput.isCancellable &&
                    !data.is_include_selected
                  )
                }
                isDateReadonly={!toggleRequired}
                disabled={
                  !toggleRequired &&
                  invoiceInput.isCancellable &&
                  !data.is_include_selected
                }
                errorMessage={invoiceInput.errors}
                color={invoiceInput.errors ? "danger" : "default"}
              />
            ) : (
              <MCInputForm
                key={`${index}-${invoiceInput.description}`}
                {...invoiceInput}
                label={invoiceInput.description}
                isRequired={
                  !(
                    !toggleRequired &&
                    invoiceInput.isCancellable &&
                    !data.is_include_selected
                  )
                }
                disabled={
                  !toggleRequired &&
                  invoiceInput.isCancellable &&
                  !data.is_include_selected
                }
                errorMessage={invoiceInput.errors}
                color={invoiceInput.errors ? "danger" : "default"}
              />
            )
          )}

          <Button
            className="w-full sm:w-4/6 bg-cantu-red-transparent-8 text-white place-self-center"
            radius="sm"
            size="lg"
            type="submit"
            isLoading={processing}
          >
            {processing ? "Enviando" : "Enviar"}
          </Button>
        </div>
      </div>
    </form>
  );
}

export default CancellationForm;
