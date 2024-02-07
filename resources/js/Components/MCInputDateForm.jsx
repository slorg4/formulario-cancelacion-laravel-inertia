import React from "react";
import MCInputForm from "@/Components/MCInputForm";
import { DatePicker } from "antd";

function MCInputDateForm({
  value,
  setValue,
  type,
  label,
  dateValue,
  setDateValue,
  isDateReadonly = false,
  isMoney = false,
  isRequired = false,
  disabled = false,
  isInvalid = false,
  errorMessage = "",
  setError = null,
  color = "default",
}) {
  return (
    <div className="flex flex-col-reverse sm:flex-row w-full gap-1 sm:gap-3">
      <MCInputForm
        value={value}
        setValue={setValue}
        label={label}
        type={type}
        isMoney={isMoney}
        isRequired={isRequired}
        disabled={disabled}
        isInvalid={isInvalid}
        errorMessage={errorMessage}
        setError={setError}
        color={color}
      />
      <DatePicker
        format={"DD/MM/YYYY"}
        value={dateValue}
        onChange={(newDate) => setDateValue(newDate)}
        disabledDate={(current) => isDateReadonly && current}
        inputReadOnly={isDateReadonly}
        disabled={disabled}
        allowClear={false}
        style={{
          borderWidth: "1px",
          borderStyle: "solid",
          borderColor: "rgb(113 113 122 / 0.9)",
          borderRadius: "12px",
          backgroundColor: "hsl(240 5% 96%)",
          opacity: disabled ? "0.5" : "initial",
        }}
        className="text-xl sm:w-1/3"
      />
    </div>
  );
}

export default MCInputDateForm;
