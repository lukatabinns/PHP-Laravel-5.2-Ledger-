@include('partials.master-header')

  @if($balance->count())

    <br/>
    <div class="col-md-12">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Inventry Balance</h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">

                        <tbody>
                        <tr>
                            <th>Animals</th>
                            <th class="text-right">Balance</th>
                        </tr>
                        @foreach($balance as $b )
                            <tr>

                                <td class="left">{{ $b->type }}</td>
                                <td class="text-right"><span class= "pUpdate" data-pk="{{ $b->id }}">{{ $b->balance }}</span></td>
                               
                            </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td class="text-right"><strong><span>{{ $sum }}</span></strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No accounts found. Please create one.
                </div>

            @endif
        </div>
<!--<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>-->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-editable.js') }}"></script>
<script type='text/javascript'>        
(function ( $ ) { 
        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
       //edit form style - popup or inline
        $.fn.editable.defaults.mode = 'popup';
        $('.pUpdate').editable({
            validate: function(value) {
                if($.trim(value) == '') 
                    return 'Value is required.';
        },
        type: 'text',
        url:'{{URL::to("/")}}/animal/postedit',  
        title: 'Edit Status',
        placement: 'top', 
        send:'always',
        ajaxOptions: {
        dataType: 'json'
        }
    });
}( jQuery ));
</script>
@include('partials.master-footer')