{{-- TRATATIVA DE ERROS --}}
@if($errors->any())
    <div class="mb-6 p-4 bg-red-100 dark:bg-red-500 border border-red-600 text-red-700 dark:text-red-200 rounded-md" role="alert">
        <strong class="font-bold">Preencha os campos de acordo!</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulário --}}
<form action={{ route('site.contato') }} method="post" class="space-y-6">
    @csrf


    <div>
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
        @error('nome')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
        @error('telefone')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
        @error('email')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <select name="motivo_contatos_id" class="w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
            <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contatos as $motivo_contato)
                <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                    {{ $motivo_contato->motivo_contato }}
                </option>
            @endforeach
        </select>
        @error('motivo_contatos_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <textarea name="mensagem" placeholder="Preencha aqui a sua mensagem" class="w-full p-3 h-32 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">{{ old('mensagem') }}</textarea>
        @error('mensagem')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600">
        ENVIAR
    </button>
</form>
