.content
  .title Create account
  input(type="text", placeholder="E-mail")
  input(type="password", placeholder="Password")
  input(type="checkbox", id="rememberMe")
  label(for="rememberMe")
  span I have read and agree to the 
    a(href="#") Terms of Use 
    | and 
    a(href="#") Privacy Policy
    
  button Create Account
  .social 
    span or sign up with social media
  .buttons
    button.facebook
      i.fa.fa-facebook
      | Facebook
    button.twitter
      i.fa.fa-twitter
      | Twitter
    button.google
      i.fa.fa-google-plus
      | Google
  
  .already Already have an account? 
    a(href="#") Sign In