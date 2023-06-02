@if ($errors->any())
    <div class="callout callout-danger">
        <h4>Por favor corrija los errores:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
