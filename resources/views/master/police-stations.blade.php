@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="police-stations" class="table table-bordered table-stripped">
                        <thead>
                        <td>POLICE STATION</td>
                        <td>DISTRICT</td>
                        <td class="m-w-100 text-right">Action</td>
                        </thead>
                        <tbody>
                        @foreach($police_stations as $police_station)
                            <tr>
                                <td>{{ $police_station->name }}</td>
                                <td>{{ $police_station->district->name }}</td>
                                <td class="text-right">
                                    <button data-url="{{ route('update-police-station',['id' => $police_station->id]) }}" class="btn btn-edit btn-info flat btn-sm" data-toggle="modal" data-target="#createDistrict">EDIT</button>
                                    <a href="{{ route('delete-police-station',['id' => $police_station->id]) }}" class="btn btn-danger flat btn-sm">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-header')
    <div class="box box-default flat">
        <div class="box-header page-head">
            <h3 class="box-title display--block">LIST OF ALL POLICE STATIONS <button type="button" data-url="{{ route('create-police-station') }}" class="btn btn-info btn-sm flat pull-right btn-create" data-toggle="modal" data-target="#createDistrict">CREATE NEW</button></h3>
        </div>
    </div>

    <div id="createDistrict" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="policeStationForm" action="{{ route('create-police-station') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CREATE POLICE STATION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">POLICE STATION NAME</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">DISTRICT NAME</label>
                            <select name="district" id="district" class="form-control" required>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning flat" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-info flat" >SAVE</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');
                $("#policeStationForm").attr('action',url);

                $.ajax({url: url, success: function(result){
                    $("#policeStationForm input[name='name']").val(result.name);
                    $("#policeStationForm select[name='district']").val(result.district_id);
                }});
            });

            $(document).on('click','.btn-create',function () {
                var url = $(this).data('url');
                $("#policeStationForm").attr('action',url);
            });

            $("#police-stations").dataTable();
        });
    </script>

@endsection