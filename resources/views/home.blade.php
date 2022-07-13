@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-3">
                <form action="{{route('store.persons')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-title">Xml feltöltés</h5>
                    <div class="mb-3">
                        <label for="xml" class="required form-text">Fájl:</label>
                        <input type="file" name="xml" class="form-control" id="xml" accept=".xml" required>
                        @error('name')
                        <div class="alert alert-danger"></div>
                        @enderror
                    </div>

                    <button type="submit" class=" btn-ok btn btn-block btn-dark">Elküld!</button>
                </form>

                @if(isset($results))
                    <h4 class="mt-5">Feltöltés eredménye:</h4>

                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Név</th>
                                <th scope="col">Adóazonosító Jel</th>
                                <th scope="col">Egyébid</th>
                                <th scope="col">Belépés</th>
                                <th scope="col">Kilépés</th>
                                <th scope="col">Státusz</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                            <tr class="
                            @if(isset($result->log->person_id))
                                    alert-success
                            @else
                                    alert-danger
                            @endif">
                                <th scope="row">{{$result->name}}</th>
                                <td> {{$result->tax_identity_sign}}</td>
                                <td> {{$result->other_id}}</td>
                                <td>{{$result->entry_date}}</td>
                                <td>{{$result->exit_date}}</td>
                                <td>
                                    @if(isset($result->log->person_id))
                                        sikers feltöltés
                                    @else
                                        sikertelen feltöltés létező személy
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
