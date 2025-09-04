<template>
	<div class="col-lg-7 m-b40">
		<div class="contact-area1 m-r20 m-md-r0">
			<div class="section-head style-1">
				<h6 class="sub-title text-primary">CONTACT US</h6>
				<h3 class="title m-b20">Get In Touch With Us</h3>
			</div>
			<span v-if="errors.length > 0">{{errors}}</span>
			<form v-on:submit.prevent="contactSubmit()" class="dz-form dzForm">
				
				<div class="dzFormMsg"></div>		
				<div class="input-group">
					<input  type="text" v-model="formData.name" class="form-control"  placeholder="Full Name">
				</div>
				<div class="input-group">
					<input  type="text" v-model="formData.email" class="form-control"  placeholder="Email Adress">
				</div>
				<div class="input-group">
					<input  type="text" v-model="formData.phone_no" class="form-control"  placeholder="Phone No.">
				</div>
				<div class="input-group">
					<textarea  v-model="formData.content" rows="5" class="form-control">Message</textarea>
				</div>
				
				<div>
					<button name="submit" type="submit" value="submit" class="btn w-100 btn-primary btnhover">SUBMIT</button>
				</div>
			</form>
		</div>
	</div>
</template>
<script>
	export default{

		data()
		{
			return{
				 formData : {name: null , email : null , phone_no : null, content : null},
				 errors : [],
			}
		},
		methods:{
			contactSubmit()
			{
				this.errors = [];
				if(!this.formData.name || !this.formData.email || !this.formData.phone_no || !this.formData.content)
				{
					this.errors.push('complete all required fields')
				}
			}
		}
	}
</script>