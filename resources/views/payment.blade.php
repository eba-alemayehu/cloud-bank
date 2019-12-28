@extends('layouts.app')
@section('content') 
    {!!"<script>var api_key='"!!}{{$api_key}}{!!"';</script>"!!}
    <div class="container">
        <div class="row" id="paymentButton">
            <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                     <h3>paymet</h3>
                    <hr>
                    <h4>Create pay button</h4>
                    <form class="form" action="" method="POST" onsubmit="return false">
                        <div class="form-group">
                             <div class="container-fluid">
                                <div clsss="row">
                                    <div class="col-sm-4">
                                        <label for="button-color">Background Color</label>
                                        <input type="color" name="button-color" class="form-control" value="#0000ff" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="text-color">Text Color</label>
                                        <input type="color" name="text-color" class="form-control" value="#ffffff" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <label for="button-text">Text on button</label>
                            <input type="text" name="button-text" class="form-control" value="Buy Now" required/>
                        </div>
                        <div class="form-group container">
                            <label for="redirect">Redirect to</label>
                            <input type="url "  placeholder='https://example.com'  name="redirect" class="form-control" value="" required/>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-primary form-control" value="Generate" style="margin-bottom:1.5em"/>
                    </form>
                    <hr>
                    <div class="container wall" id="buttonView" style="display:none"></div>

                    <div class="form-group"  id="htmlCode" style="display:none">
                        <hr>
                        <div class="container-fluid">
                            <label for="output-html">HTML code</label>
                            <pre style="padding:0px">
                                <textarea name="output-html" class="form-control" id="htmlCode" value=""
                                style="width: 100%; height:15em;display:block">
                                
                                </textarea>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection