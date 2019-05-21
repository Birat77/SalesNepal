}
		#nav{
			background:#558C89;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);	
		}
		#nav ul{
			list-style: none;
			margin: 0px;
			padding: 0px;

		}
		#nav ul li{
			float: left;
			width: 200px;
			height: 40px;
			position: relative;
			display: block;
			line-height: 40px;
			background:#558C89;
			text-align: center;


		}
		#nav ul li ul{
			list-style-type: none;
      position: absolute;
      background:#f0f5f5;
      top: 100%;
      z-index: 1;
      display: none;
      left: 0;
			
		}
		#nav ul li:hover ul{
			display: block;
		}
		#nav a{
			font-weight: bold;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
			text-decoration: none;
			font-size:16px;
			color: #c1c1c1;
			 
		}
		#nav ul li:hover ul{
			color: #006666;
			display: block;

		}
		#nav ul li a:hover{
      display: inline-block;
      font-size: 18px;
      color: #1f2e2e;
      background-color: #a1a1a1;
      display: block;
      height: 30px;


      
    }