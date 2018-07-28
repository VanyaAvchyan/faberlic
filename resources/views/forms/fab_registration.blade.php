<!-- Modal -->
<div class="modal fade" id="alert-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>{!! trans('site.technical_works') !!}</b></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('url' => '/user/fab-registration/'.\App::getLocale(), 'method' => 'POST', 'class' => 'form-horizontal form-label-left'))!!}

                <div class="form-group">
                    <label class="control-label col-sm-3" for="fab_first_name">{!! trans('site.first_name') !!}*</label>
                    <div class="col-sm-9">
                        <input type="text" name="fab_first_name" class="form-control col-sm-10" id="fab_first_name" placeholder="{!! trans('site.first_name') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="fab_last_name">{!! trans('site.last_name') !!}*</label>
                    <div class="col-sm-9">
                        <input type="text" name="fab_last_name" class="form-control col-sm-10" id="fab_last_name" placeholder="{!! trans('site.last_name') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="fab_middle_name">{!! trans('site.middle_name') !!}</label>
                    <div class="col-sm-9">
                        <input type="text" name="fab_middle_name" class="form-control col-sm-10" id="fab_middle_name" placeholder="{!! trans('site.middle_name') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fab_email" class="control-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="fab_email" class="form-control" id="fab_email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fab_phone" class="control-label col-sm-3">{!! trans('site.phone') !!}*</label>
                    <div class="col-sm-9">
                        <input type="text" name="fab_phone" class="form-control" id="fab_phone" placeholder="{!! trans('site.phone') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fab_address" class="control-label col-sm-3">{!! trans('site.address') !!}*</label>
                    <div class="col-sm-9">
                        <input type="text" name="fab_address" class="form-control" id="fab_address" placeholder="{!! trans('site.address') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fab_birth_date" class="control-label col-sm-3">{!! trans('site.birth_date') !!}*</label>
                    <div class="col-sm-9">
                        <input type="date" name="fab_birth_date" class="form-control" id="fab_birth_date" placeholder="{!! trans('site.birth_date') !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fab_gender_male" class="control-label col-sm-3">{!! trans('site.gender') !!}</label>
                    <div class="col-sm-5">
                        <label class="radio-inline"><input type="radio" name="fab_gender" id="fab_gender_male" value="male">{!! trans('site.male') !!}:</label>
                        <label class="radio-inline"><input type="radio" name="fab_gender" id="fab_gender_female" value="female">{!! trans('site.female') !!}:</label>
                    </div>
                </div>

                <input type="hidden" value="{{$user->email}}" name="user_email">
                <button type="submit" class="btn btn-primary">{!! trans('site.send') !!}</button>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('site.close') !!}</button>
            </div>
        </div>
    </div>
</div>
