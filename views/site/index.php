<?php

/* @var $this yii\web\View */

$this->title = 'rabitech';
?>
<div class="site-index">

    <div class="jumbotron">
    <h3>Online Leave Application</h3>
    <p>Logged in as:<?php echo Yii::$app->session['username'] . Yii::$app->session['lname']; ?></p>
    </div>

    <div class="body-content">
<div class="container">
    <div class="row text-left">
        <div class="col-lg-10">
        <p>
            <ol style="list-style: number_format; ">
                <li>Each person is provided with a total of 4 leave days a year</li>
                <li>Leave applications should be made 1 day early</li>
                <li>Emergency issues can be reported immediately.</li>
                <li>Exceeding the leave days you will be fined</li>
        </p>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
