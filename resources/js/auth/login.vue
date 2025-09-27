<template>
	
	<div class="page-content">
		<!-- inner page banner -->
		<div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/background/bg3.jpg);">
			<div class="container">
				<div class="dz-bnr-inr-entry">
					<h1>Login</h1>
					<nav aria-label="breadcrumb" class="breadcrumb-row">
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"> Home</a></li>

							<router-link v-bind:to="{name:'register'}"> <li class="breadcrumb-item">Registration</li> </router-link>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- inner page banner End-->
		
		<!-- contact area -->
		<section class="content-inner shop-account">
			<!-- Product -->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6 mb-4">
						<div class="login-area">
							<form v-on:submit.prevent="loginSubmit()">
								<h4 class="text-secondary">Login</h4>
								<p class="font-weight-600">If you don't have an account with us, please Registration.</p>
								
								<div class="mb-4">
									<label class="label-title">Email address *</label>
									<input v-model="formData.email"  class="form-control" placeholder="Your Email address" type="email" :class="[{'is-invalid': this.errorFor('email')}]">


									<div class="text-danger" v-for="i in this.errorFor('email')" :key="i">
										{{i}}
									</div>
								</div>
								<div class="mb-4">
									<label class="label-title">Password *</label>
									<input v-model="formData.password"  class="form-control " placeholder="Type Password" type="password">

									<div class="text-danger" v-for="i in this.errorFor('password')" :key="i">
										{{i}}
									</div>
								</div>
								<div class="mb-5">
									<small>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="privacy-policy.html">privacy policy</a>.</small>
								</div>
								<div class="text-left">
									<button class="btn btn-primary btnhover w-100 me-2">Login</button>
								</div>
								
												
							</form>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Product END -->
		</section>
		<!-- contact area End--> 
	</div>
	
</template>
<script>
	export default{

		data()
		{
			return{

				formData : {email : null , password : null},
				errors:null,
				status:null,
			}
		},

		methods:{

			loginSubmit()
			{
				axios.post(`/api/user/login`,this.formData)
							.then((response)=>{
								

								//manage state
								this.$store.dispatch('checkAuthenticationStatus',true);
								this.$store.dispatch('getAuthToken',response.data.token)

								this.formData.email = null;
								this.formData.password = null;
								this.$router.push({name : 'profile'})
							})
							.catch(error=>{
								if (422 == error.response.status) {
									this.errors = error.response.data.errors;
								}
								this.status = error.response.status
							})		
			},
			errorFor(field)
			{	
				//console.log(this.hasErrors)
				return this.hasErrors &&  this.errors[field] ? this.errors[field] : null;
			},
			
		},
		computed: {
		    hasErrors() {
		      return this.status == 422 && this.errors !== null
		    }
		  }


	}
</script>