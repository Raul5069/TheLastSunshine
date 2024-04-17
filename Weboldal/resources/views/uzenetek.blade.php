@extends('layout')
@section('content')
    <header class="masthead10 text-secondary">




        <section class="py-4 px-2">
            <div class="mx-auto w-75">
                <h2 class="display-4 pb-3">Üzenetek</h2>
                <table class="table">
                    <tr>
                        <th class="table-dark">Státusz</th>
                        <th class="table-dark">Feladó</th>
                        <th class="table-dark">Beérkezve</th>
                    </tr>
                    @foreach ($result as $row)
                        <tr class="table-secondary">
                            <td @if ($row->status == 'n') class ="table-warning fw-bold" @endif>
                                @if ($row->status == 'n')
                                    Olvasatlan
                                @else
                                    Olvasott
                                @endif
                            </td>
                            <td @if ($row->status == 'n') class ="table-warning fw-bold " @endif>
                                <a href="/msg-read/{{ $row->id }}">{{ $row->name }}</a>
                            </td>
                            <td @if ($row->status == 'n') class ="table-warning fw-bold" @endif>
                                {{ $row->date }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>

    </header>
@endsection
