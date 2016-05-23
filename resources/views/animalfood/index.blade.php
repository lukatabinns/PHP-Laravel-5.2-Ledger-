@include('partials.master-header')

    <div class="col-md-12">

       <a href="{{ route('account_create') }}">Create a new account</a>
    </div>

    <div class="col-md-12">
        <div class="row">
            <br/>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Animal Food Records</h3>
                </div>


                @if($animalFoods->count())
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="center-text">
                                <th style="width: 9%;">Date Bought</th>
                                <th>animal food type</th>
                                <th>brand</th>
                                <th>expiry date</th>
                                <th>amount</th>
                            </tr>
                            </thead>
                            <tbody class="center-text">
                            @foreach($animalFoods as $animalFood)
                                <tr>
                                    <td>{{ $animalFood->date_bought }}</td>
                                    <td>{{ $animalFood->type }}</td>
                                    <td>{{ $animalFood->brand }}</td>
                                    <td>{{ $animalFood->expiry_date }}</td>
                                    <td>{{ $animalFood->amount }}</td>
                              </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-12">
                {{ $animalFoods->links() }}
            </div>
            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No animal food.
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')