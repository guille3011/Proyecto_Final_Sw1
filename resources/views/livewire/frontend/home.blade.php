<div>
    <x-slot:title>
        Pagina principal de votacion
        </x-slot>
        <x-slot:image_title>
            Eleccion 2022
            </x-slot>
            <div class="my-5">
                <h1 class="text-center">Votaciones</h1>
                <div class="container my-4">
                    <div class="table-responsive">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center"> Nombre Condidato</th>
                                    <th class="text-center">Posicion</th>
                                    
                                    <th class="text-center">Enviar voto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($candidates) > 0)
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->id }}</td>
                                            <td class="text-center" style="vertical-align: middle"><img
                                                    src="{{ asset('storage') }}/{{ $candidate->image }}" alt=""
                                                    style="width:100px;height:100px;"></td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->fname }} {{ $candidate->lname }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->positions->positions }}</td>
                                            
                                            @php
                                                $isVoted = \App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();
                                                
                                            @endphp

                                            @isset($isVoted)
                                                @if ($isVoted->user_id == Auth::user()->id || $isVoted->con_id == $candidate->id)
                                                    <td class="text-center" style="vertical-align: middle"><button
                                                            disabled class="btn btn-success">Enviado</button>
                                                    </td>
                                                @endif
                                            @endisset

                                            @empty($isVoted)
                                                <td class="text-center" style="vertical-align: middle"><button
                                                        class="btn btn-success"
                                                        wire:click='addVote({{ $candidate->id }})'>Enviar</button>
                                                </td>
                                            @endempty



                                        </tr>
                                    @endforeach
                                @else
                                    <h3>sin dato disponibles en este momento</h3>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
