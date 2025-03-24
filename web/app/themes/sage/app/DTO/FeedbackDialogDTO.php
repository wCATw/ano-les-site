<?php

namespace App\DTO;

class FeedbackDialogDTO
{
    public string $btnText;
    public string $formTitle;
    public string $formId;
    public string $btnClass;
    public string $formClass;

    public function __construct(string $btnText, string $formTitle, string $formId, string $btnClass, string $formClass)
    {
        $this->btnText = $btnText;
        $this->formTitle = $formTitle;
        $this->formId = $formId;
        $this->btnClass = $btnClass;
        $this->formClass = $formClass;
    }
}
