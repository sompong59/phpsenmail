<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Contact Form</title>
	<link rel="stylesheet" type="text/css" 
	      href="style.css">
</head>
<body>
  <div class="form-container">
  	<h2>Contact Form</h2>
  	<?php if (isset($_GET['error'])) { ?>
  		<p class="error">
  			<?=htmlspecialchars($_GET['error'])?>
  		</p>
  	<?php } ?>
  	
  	<?php if (isset($_GET['success'])) { ?>
  		<p class="success">
  			<?=htmlspecialchars($_GET['success'])?>
  		</p>
  	<?php } ?>
   

  	<form action="contact.php" method="POST">
	  <div>
<label"> ພາສາຕົ້ນສະບັບ</label>
        <div>
            <select type="text" name="name">
                <option value="ພາສາລາວ ">ພາສາລາວ </option>
                <option value="ພາສາອັງກິດ ">ພາສາອັງກິດ </option>
                <option value="ພາສາຈີນ ">ພາສາຈີນ </option>
                <option value="ພາສາຫວຽດນາມ ">ພາສາຫວຽດນາມ </option>
                <option value="ພາສາຟຣັງ ">ພາສາຟຣັງ </option>
                <option value="ພາສາໄທ ">ພາສາໄທ </option>
                <option value="ພາສາລັດເຊຍ ">ພາສາລັດເຊຍ </option>
                <option value="ອື່່ນ ໆ">ອື່ນ ໆ</option>
            </select>
        </div>
</div>
<!-- <div>
<label"> ພາສາເປົ້າໝາຍ</label>
        <div>
            <select type="text" name="pong">
			<option value="ພາສາລາວ ">ພາສາລາວ </option>
                <option value="ພາສາອັງກິດ ">ພາສາອັງກິດ </option>
                <option value="ພາສາຈີນ ">ພາສາຈີນ </option>
                <option value="ພາສາຫວຽດນາມ ">ພາສາຫວຽດນາມ </option>
                <option value="ພາສາຟຣັງ ">ພາສາຟຣັງ </option>
                <option value="ພາສາໄທ ">ພາສາໄທ </option>
                <option value="ພາສາລັດເຊຍ ">ພາສາລັດເຊຍ </option>
                <option value="ອື່່ນ ໆ">ອື່ນ ໆ</option>
            </select>
        </div>
</div>

<div>
<label> แนบไฟล์ของคุณ (สูงสุด 5 ไฟล์) </label>
<input type="file" name="form_fields[file_attachments][]" id="form-field-file_attachments" class="elementor-field elementor-size-sm  elementor-upload-field" multiple="multiple" data-maxsize="10" data-maxsize-message="This file exceeds the maximum allowed size.">
    </div>
	<div>
            <label> ชื่อของคุณ </label>
            <input size="1" type="text" name="form_fields[your_name]" id="form-field-your_name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="กรุณากรอกชื่อเต็มของคุณ" required="required" aria-required="true">
        </div> -->
		<label> อีเมลของคุณ	</label>
  		<input type="email" name="email" 
  		       placeholder="Your Email" 
  		       required>
				 <!-- <div>
            <label> หมายเลขโทรศัพท์ของคุณ </label>
            <input size="1" type="tel" name="form_fields[phone_number]" id="form-field-phone_number" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="โปรดกรอกหมายเลขโทรศัพท์ของคุณ" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
        </div> -->
  		<input type="text" name="subject" 
  		       placeholder="Subject" 
  		       required>
  		<textarea name="text" 
  		          rows="5"
  		          placeholder="Your Message"></textarea>
  		<button type="submit">Send Message</button>

  	</form>
  </div>
</body>
</html>