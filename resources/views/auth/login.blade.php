<x-layouts.auth title="Bem vindo de volta" subtitle="Entre na sua conta">
    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <x-form.field label="Email" name="email" type="email" />
        <x-form.field label="Senha" name="password" type="password" />

        <x-form.submit-button text="Entrar"/>

        <x-form.link text="Ainda não tem uma conta?" textLink="Cadastre-se aqui" href="{{ route('register') }}" />
    </form>
</x-layouts.auth>
