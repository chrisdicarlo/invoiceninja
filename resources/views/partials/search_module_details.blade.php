        <h3>{{ $name }}</h3>
        <p>{{ $description }}</p>
    <a style="display:block;" href="{{ $repository }}"><i class="fa fa-github"></i> {{ $repository }}</a>
    {!! Button::primary(trans('texts.install_module'))->appendIcon(Icon::create('cloud-download'))->withAttributes(['onclick' => "installModule(\"$name\")"]) !!}