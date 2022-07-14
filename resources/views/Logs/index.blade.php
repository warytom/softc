@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-3">
                    <h4 class="mt-5">Logok</h4>
                    <div class="card table-card">
                        @foreach($logs as $log)
                            <div class="card mb-1">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Felöltés ideje</th>
                                        <th scope="col">Feltöltő személy</th>
                                        <th scope="col">Bővebben</th>
                                        <th scope="col">Xml</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{$log->created_at->format('Y-m-d H:m')}}
                                            ({{$log->created_at->diffForHumans(null, true).' ezelött'}})
                                        </th>
                                        <td>{{($log->author->name)}}</td>
                                        <td>
                                            <a class="btn btn-primary" data-bs-toggle="collapse"
                                               href="#logCollapse-{{ $loop->index }}" role="button"
                                               aria-expanded="false" aria-controls="collapseExample">
                                                Logok
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" download="MyPdf"
                                               href="{{ Storage::url($log->path) }}" title="MyPdf">
                                                Letöltés
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapse" id="logCollapse-{{ $loop->index }}">
                                <div class="card card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Felöltés ideje</th>
                                            <th scope="col">Feltöltő személy</th>
                                            <th scope="col">Adóazonosító Jel</th>
                                            <th scope="col">Név</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($log->children as $log_p)
                                            <tr>
                                                <th scope="row">{{$log_p->id}}</th>
                                                <td>{{$log_p->created_at->format('Y-m-d H:m')}}
                                                    ({{$log_p->created_at->diffForHumans(null, true).' ezelött'}})
                                                </td>
                                                <td>{{($log_p->author->name)}}</td>
                                                <td> {{$log_p->person->tax_identity_sign}}</td>
                                                <td> {{$log_p->person->name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
