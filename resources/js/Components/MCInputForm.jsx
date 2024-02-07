import { Input, Textarea } from "@nextui-org/react";
import React from "react";

function MCInputForm({
  value,
  setValue,
  type,
  label,
  isMoney = false,
  isRequired = false,
  disabled = false,
  isInvalid = false,
  errorMessage = "",
  setError = null,
  color = "default",
}) {
  function handleOnChange(e) {
    setValue(e.target.value);
    
    if (setError && errorMessage) {
      setError("");
    }
  }

  return type === "textarea" ? (
    <Textarea
      value={value}
      onChange={handleOnChange}
      label={label}
      isRequired={isRequired}
      isDisabled={disabled}
      isInvalid={isInvalid}
      errorMessage={errorMessage}
      color={color}
      classNames={{
        label: "text-tiny sm:text-lg",
        input: "sm:resize-y sm:max-h-[250px] min-h-[40px] text-base sm:text-xl",
        inputWrapper: "border-solid border-1 border-zinc-500",
      }}
    />
  ) : (
    <Input
      value={value}
      onChange={handleOnChange}
      classNames={{
        label: "text-tiny sm:text-lg",
        input: "text-base sm:text-xl",
        inputWrapper: "border-solid border-1 border-zinc-500",
      }}
      type={type}
      label={label}
      isRequired={isRequired}
      isDisabled={disabled}
      isInvalid={isInvalid}
      errorMessage={errorMessage}
      color={color}
      startContent={
        isMoney && (
          <div className="pointer-events-none flex items-center">
            <span className="text-default-400 text-base sm:text-xl">$</span>
          </div>
        )
      }
    />
  );
}

export default MCInputForm;
