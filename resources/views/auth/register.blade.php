<x-layouts.auth title="Crie sua conta" subtitle="Cadastre-se para começar">
    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <x-form.field label="Nome" name="name" type="text" />

        <x-form.field label="Email" name="email" type="email" />

        <x-form.field label="Senha" name="password" type="password" />
        <ul id="password-rules" class="list-unstyled mt-2 d-none">
            <li id="rule-length" class="text-danger"><small>• Mínimo 8 caracteres</small></li>
            <li id="rule-uppercase" class="text-danger"><small>• Letra maiúscula</small></li>
            <li id="rule-lowercase" class="text-danger"><small>• Letra minúscula</small></li>
            <li id="rule-number" class="text-danger"><small>• Número</small></li>
            <li id="rule-special" class="text-danger"><small>• Caractere especial</small></li>
        </ul>

        <x-form.field label="Confirmar senha" name="password_confirmation" type="password" />

        <x-form.submit-button text="Cadastrar" />

        <x-form.link text="Já tem uma conta?" textLink="Entre aqui" href="{{ route('home') }}" />
    </form>

    <script src="{{ asset('js/password-validations.js') }}"></script>
</x-layouts.auth>
