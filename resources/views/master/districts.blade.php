@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="districts" class="table table-bordered table-stripped">
                        <thead>
                        <td>DISTRICT NAME</td>
                        <td class="m-w-100 text-right">Action</td>
                        </thead>
                        <tbody>
                        @foreach($districts as $district)
                            <tr>
                                <td>{{ $district->name }}</td>
                                <td class="text-right">
                                    <a href="{{ route('delete-district',['id' => $district->id]) }}" class="btn btn-danger flat btn-sm">DELETE</a>
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
            <h3 class="box-title display--block">LIST OF ALL DISTRICTS <button type="button" class="btn btn-info btn-sm flat pull-right" data-toggle="modal" data-target="#createDistrict">CREATE NEW</button></h3>
        </div>
    </div>

    <div id="createDistrict" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ route('create-district') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CREATE DISTRICT</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">DISTRICT NAME</label>
                            <input type="text" id="name" name="name" class="form-control" required>
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

            $("#districts").dataTable();
        });
    </script>

@endsection