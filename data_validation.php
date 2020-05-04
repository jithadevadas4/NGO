

<!--<script type="text/javascript" src="jquery_002.js"></script>-->

<script type="text/javascript" src="jquery.validate.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>


<script type="text/javascript">
jQuery.validator.addMethod("notEqual", function(value, element, param) {return this.optional(element) || value != param;}, "Please enter your name");
			$(document).ready(function() {
			$("#register_form").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					person_name: 
					{
						required: true		
					},// simple rule, converted to {required:true}
					contact_no: 
					{
						required: true
					},
					location_key: 
					{
						required: true,
					    number: true	
					},
					amount: 
					{
						required: true,
					    number: true	
					},
					remark2: 
					{
						required: true	
					},
					comment: 
					{
						required: true
					}
					},
					messages: 
					{
						comment: "Please enter a comment."
					}
			});	
		});	
</script>

<link type="text/css" href="jquery.datepick.css" rel="stylesheet">



 <script type="text/javascript" src="jquery.datepick.js"></script>








