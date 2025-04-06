<x-layouts.auth title="">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Meu Perfil</h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Sair</button>
            </form>
        </div>

        @if (session('success'))
            <x-alert.success message="{{ session('success') }}" />
        @endif


        <form method="POST" action="{{ route('dashboard.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="text-center mb-4 position-relative" id="avatar-container" style="display: block;">
                <x-profile.avatar src="{{ asset('avatars/' . $user->avatar) }}" size="150" />
            </div>

            <x-form.field label="Nome" name="name" type="text" value="{{ old('name', $user->name) }}" />

            <x-form.field label="Email" name="email" type="email" value="{{ old('email', $user->email) }}" />

            <x-form.field label="Nova senha (opcional)" name="password" type="password" />
            <ul id="password-rules" class="list-unstyled mt-2 d-none">
                <li id="rule-length" class="text-danger">• Mínimo 6 caracteres</li>
                <li id="rule-uppercase" class="text-danger">• Letra maiúscula</li>
                <li id="rule-lowercase" class="text-danger">• Letra minúscula</li>
                <li id="rule-number" class="text-danger">• Número</li>
                <li id="rule-special" class="text-danger">• Caractere especial</li>
            </ul>

            <x-form.field label="Confirmar nova senha" name="password_confirmation" type="password" />

            <x-form.submit-button text="Salvar alterações" />
        </form>
    </div>
    <script src="{{ asset('js/password-validations.js') }}"></script>
    <script>
        const avatarInput = document.querySelector('input[name="avatar"]');
        const avatarPreview = document.getElementById('avatar-preview');

        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                    avatarPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 3000); // 3 segundos
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-layouts.auth>
