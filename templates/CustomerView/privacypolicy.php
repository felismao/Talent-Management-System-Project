<?php ?>
<!-- http://localhost/team54-app_fit3048/customer-view/privacypolicy -->

<section style="padding-top: 150px"></section>

<section style="padding-left: 15%; padding-right: 15%">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 align-content-center">
        <h2><b>Privacy Policy</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non.
            Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros,
            in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem,
            ac porta enim interdum quis.</p>
    </div>
</div>
</div>


<section style="padding-top: 50px"></section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 align-content-center">
        <h2>Policy Updates</h2>
        <p>This Policy may change from time to time and is available on our website.</p>
    </div>
</div>
</div>

<section style="padding-top: 50px"></section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 align-content-center">
        <h2>Privacy Policy Complaints and/or Enquiries</h2>
            <p>If you have any queries or complaints about our Privacy Policy, please contact us at:<br>
            <b>In writing:</b> Address<br>
                <b>Via our website:</b> <?= $this->Html->link(
                    'Contact Us',
                    ['controller' => 'Emails', 'action' => 'add'],
                    ['class' => ''])
                ?><br>
                <b>Via phone on:</b> +123 456 789</p>
    </div>
</div>
</div>
</section>

<section style="padding-top: 50px"></section>
