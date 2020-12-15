<div class="form-group">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img id="blah"
                 {{isset($library)? "src =" . asset('storage/'.$library->image) :
"src = http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"

}}

                 src="" alt=""
                 style="width: 186px; height: 140px;"


            >
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
        <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input id="image" type="file" name="image"

                                                                                   @if(isset($library)) value="{{$library->image}}" @else value="{{@old('image')}}" @endif
                                                                                   @if($errors->first('image')) style="border: solid 1px red;" @endif

                                                                            >

                                                                        </span>
            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
        </div>
    </div>

</div>

