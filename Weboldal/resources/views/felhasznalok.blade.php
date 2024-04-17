@extends('layout')
@section('content')
    <header class="masthead4">
    <div class="container mt-5 pt-5">
        <div class="row gap-4">
            @foreach ($result as $row)
                <div class="col">
                    <table class="table manage-candidates-top card-element shadow-sm border table-secondary opacity-75">
                        <tr>
                            <th>Felhasználónév</th>
                            <th class="text-center">Játékstílus</th>
                            <th class="action text-right">Üzenet</th>
                        </tr>


                        <tr class="candidates-list">
                            <td class="title text-secondary">
                                <div class="candidate-list-details">
                                    <div class="candidate-list-info">
                                        <div class="candidate-list-title">
                                            <h5 class="fs-5"><a class="text-dark" href="/adatlap/{{ $row->id }}">{{ $row->name }}
                                                    {{ $row->age }}</a></h5>
                                        </div>
                                        <div class="candidate-list-option">
                                            <ul class="fs-6">
                                                <li>{{ $row->email }}</li>
                                                <li>{{ $row->kedvetel }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="candidate-list-favourite-time text-center">
                                <div class="candidate-list-time order-1">
                                    {{ $row->gender == 'm' ? 'Előretörő' : 'Biztonságos' }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p><a href="/msg-read/{{ $row->id }}" class="btn btn-outline-dark btn-secondary  px-2 py-3 fs-6 fw-bolder me-md-2">Üzenet
                                            írása</a></p>
                                </div>
                            </td>
                        </tr>


                    </table>
                </div>
            @endforeach
        </div>
    </div>
    </header>
@endsection
