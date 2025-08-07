<h3>Fornecedor</h3>

@php

@endphp

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Iteração Atual:{{$loop->iteration}}
        br
Fornecedor: {{$fornecedor['nome']}}
<br>
Status: {{ $fornecedor['status']}}
<br>
CNPJ: {{$fornecedor['cnpj'] ?? ''}}
<br>
Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedores[0] ['telefone'] ?? ''}}
<br>
        @if($loop->first)
        Primeira iteração
        @endif

        @if($loop->last)
            Ultima iteração
            <br>
            Total de registros {{ $loop->count }}
        @endif
<hr>
    @empty
        Não existem fornecedores
    @endforelse
@endisset

