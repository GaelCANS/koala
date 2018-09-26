<style>

    .contact-form-page{
        height: 50px;
        width: 50px;
        display: block;
        border-radius: 50%;
        position: absolute;
        bottom: 42px;
        right: 42px;
        overflow: hidden;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        background: #7EC6E7;

    }

    .show-profile{
        background: #3aa8db;
        height: 100%;
        display: block;
        width: 336px;
        bottom: 0;
        right: 0;
        position: absolute;
        overflow-y: scroll;
        border-radius: 0;
        padding-bottom: 30px;


    }

    .form-profile-img{
        float: left;
    }
    .form-profile-img img{
        border-radius: 50%;
        margin: 20px 0 0 14px;
    }
    .contact-form-page h1{
        font-size: 18px;
        color: #fff;
        margin: 20px 26px;
        padding: 0px;
        line-height: 29px;
        padding-right: 30px;
    }
    .top-btn{
        position: absolute;
        top: 15px;
        right: 15px;
        background: #98D1EC;
        color: #fff;
        padding: 15px 0;
        text-align: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        -o-transition: all 1s;
        transition: all 1s;
        opacity: 0;
    }
    .top-btn:hover{
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
        background: #7EC6E7;
        color: #fff
    }

    .header-btn, .footer-btn a{
        font-size: 20px;
        color: #fff;
        background: #3aa8db;
        float: right;
    }
    .form-head{
        display: block;
    }
    .cancel-btn-img{
        position: relative;
    }
    .footer-btn{
        position: relative;
    }

    .buttom-btn{
        position: absolute;
        bottom: 30px;
        right: 30px;
        background: #3aa8db;
        color: #fff;
        padding: 21px;
        text-align: center;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        opacity: 1;
    }
    .buttom-btn i{
        font-size: 30px;
    }

    .buttom-btn:hover{
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
        background:#71C0E5;
        color: #fff
    }
    input.form-control {
        height: 40px;
        border-radius: 0;
        outline: none;
    }
    textarea.form-control {
        height: 150px;
        border-radius: 0;
    }
    .contact-form-page form{
        padding: 0 26px;
    }

    .contact-form-page .submit-buttom{
        padding: 10px 40px;
        text-align: center;
        display: block;
        border-radius: 0;
        background: #007BB5;
        border: none;
        border-bottom: 5px solid #005B85;
        text-shadow: none;
        box-shadow: none;
        font-size: 16px;
        color: #ffffff;
        text-transform: uppercase;
        font-family: 'Roboto Condensed', sans-serif;
    }
    .form-group label{
        font-size: 14px;
        color: #fff;
    }

    /*
        BUTTON OPACITY STYLE
    */
    .top-btn-show{
        opacity: 1 !important;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }
    .buttom-btn-hide{
        opacity: 0 !important;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }
    /* GITHUB SOURCE STYLE  */
    .github-source{
        display:inline-block;
        color:#000;
        margin:20px;
        position: relative;
        z-index:999999;
    }
    .github-source i{
        font-size:50px;
        color:#fff
    }
</style>

        <div class="wrapper">
            <div class="contact-form-page">
                <div class="form-head">
                    <div class="header-btn">
                        <a class="top-btn" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <h1>Please fill the form - I will response as fast as I can!</h1>

                {!! Form::model(
                    null,
                    array(
                        'class'     => 'form-horizontal',
                        'id'        => 'help-form',
                        'data-link' => route('send-message')
                    )
                ) !!}
                    <div class="form-group">
                        <label for="exampleInputText">Name</label>
                        {!! Form::text( 'name' , ( auth()->user() ? auth()->user()->fullname : '' ) , array( 'class' => 'form-control font-weight-bold' , 'id' => 'name-help' , 'disabled' => 'true' ) ) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMessage">Message</label>
                        {!! Form::textarea( 'message' , null , array( 'class' => 'form-control' , 'rows' => '4', 'cols' => '10' , 'required' => true , 'id' => 'message-help') ) !!}
                    </div>
                    {!! Form::hidden( 'page' , url()->current() , array( 'id' => 'url-help' ) ) !!}
                    <button type="submit" class="submit-buttom">Envoyer</button>
                {!! Form::close() !!}

            </div>
            <a class="buttom-btn" href="#"><i class="fa fa-times"></i></a>
        </div>

