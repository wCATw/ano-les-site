@php
    /**
     * @var \App\DTO\FeedbackDialogDTO $model;
     */
@endphp

<button class="{!! $model->btnClass !!}" data-fancybox data-type="clone" data-src="#dialog-{!! $model->formId !!}">{!! $model->btnText !!}</button>
{{--@dd($model)--}}
<form id="dialog-{!!$model->formId!!}" class="{!!$model->formClass!!}" style="display: none;">
  {!! do_shortcode('[contact-form-7 id="' . $model->formId . '" title="' . $model->formTitle . '"]') !!}
</form>
