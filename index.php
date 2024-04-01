<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="./js/script.js"></script>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <style>
        .cont{
            border: 1px solid #f1356d;
            margin: 20px;
            text-align: justify;
        }

        .cont > .head{
            background-color: #f1356d;
            color: white;
            padding-left: 20px;
            font-weight: bold;
        }

        .cont > .head > p{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .cont > .head > p > .material-symbols-outlined{
            font-size: 30px;
        }


        .cont > .body{
            padding: 20px;
        }
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 4000,
            'GRAD' 0,
            'opsz' 24;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav{
            position: sticky;
            top: 0;
        }

    </style>
</head>
<body>
    <div class="head">
        <div class="left">
            <a href=""><img src="./images/facebook.png" class="icon" alt="fb"></a>
            <a href=""><img src="./images/twitter.png" class="icon" alt="twitter"></a>
        </div>
        <div class="right">
            <a href="signin.php">Login</a>
            <a href="#about">Skip to main content</a>
        </div>
    </div>
    <header>
        <div class="logo">
            <img src="./images/logo1.png" alt="">
        </div>
        <marquee behavior="scroll" direction="right" scrollamount="20">
            <div class="text">
                <h1>Crime report portal</h1>
                <p>Empowering People with Information Technology</p>
            </div>
        </marquee>
    </header>
    <nav>
        <a href="#">Home</a> |
        <a href="#vision">Vision</a> |
        <a href="#mission">Mission</a> |
        <a href="#about">About us</a> |
        <a href="#rti">RTI</a> |
        <a href="#service">Services</a> |
        <a href="#contact">Contact Us</a>
    </nav>
    <div class="slideshow">
        <img src="./images/slide1.jpg" alt="">
        <img src="./images/slide2.jpg" alt="">
        <img src="./images/slide3.jpg" alt="">
        <img src="./images/slide4.jpg" alt="">
    </div> 
    <div class="cont" id="vision">
        <div class="head">
            <p>
                <span class="material-symbols-outlined">
                for_you
                </span> 
                Vision
            </p>
        </div>
        <div class="body">
            <p style="font-size: 16px;">Our vision at the Crime Report Portal is to create safer and more secure communities through collaborative efforts and innovative solutions. We envision a world where individuals feel empowered to report crimes without fear, where communities actively engage in crime prevention, and where transparency and accountability are paramount.</p>
            <p style="font-size: 16px;">By fostering partnerships with law enforcement agencies, government authorities, and community stakeholders, we aim to build a network of support that promotes safety and security for all. Our vision includes leveraging technology and data-driven approaches to continuously improve our platform and enhance crime prevention efforts.</p>
            <p style="font-size: 16px;">Together, we strive to make a positive impact on society, creating safer environments where individuals and families can thrive free from the fear of crime.</p>
            <p style="color: green;">Join us in our vision to create safer communities for all.</p>
        </div>
    </div>
    <div class="cont" id="mission">
        <div class="head">
            <p> <span class="material-symbols-outlined">
                settings_accessibility
                </span> Mission</p>
        </div>
        <div class="body">
            <p style="font-size: 16px;">Our mission at the Crime Report Portal is to empower individuals to report crimes effectively and contribute to creating safer communities. We are dedicated to providing a user-friendly platform that facilitates the reporting of various types of crimes, ensuring that every report is handled promptly and with professionalism.</p>
            <p style="font-size: 16px;">We strive to maintain transparency and accountability in all our interactions, fostering trust and confidence among our users. Through collaboration with law enforcement agencies, government authorities, and community stakeholders, we aim to address the root causes of crime and promote proactive crime prevention strategies.</p>
            <p style="font-size: 16px;">Our mission includes leveraging technology and data analytics to enhance our platform's capabilities and improve the efficiency of crime reporting and resolution processes. We are committed to continuously improving our services to meet the evolving needs of our users and contribute to building safer communities for all.</p>
            <p style="color: green;">Join us in our mission to make our communities safer.</p>
        </div>
    </div>    
    <div class="cont" id="about">
        <div class="head">
            <p><span class="material-symbols-outlined">
                info
                </span>
                About us</p>
        </div>
        <div class="body">
            <p style="font-size: 18px; color: #27334f;">Welcome to the Crime Report Portal, your trusted platform for reporting crimes and fostering safer communities.</p>
                <p style=" font-size: 16px;">At Crime Report Portal, we are committed to empowering individuals to take action against crime. We understand the importance of creating a safe environment for everyone, and that's why we've created this platform to facilitate the reporting and resolution of crimes. Our mission is to provide a user-friendly interface that enables seamless reporting of various types of crimes, from petty theft to more serious offenses. We believe that by making it easier for individuals to report crimes, we can contribute to the prevention and resolution of criminal activities. Transparency and accountability are at the core of our values. We strive to maintain the highest standards of integrity and fairness in all our interactions. Our team works tirelessly to ensure that every report is handled promptly and with the utmost professionalism. Through collaboration with law enforcement agencies, government authorities, and community stakeholders, we aim to create a network of support that promotes safety and security for all. Join us in our mission to make our communities safer. Together, we can make a difference and create a brighter future for generations to come.
                <br>
                <p style="color: green;">Thank you for choosing Crime Report Portal.</p>
            </p>
        </div>
    </div>
    <div class="cont" id="rti">
        <div class="head">
            <p> <span class="material-symbols-outlined">
                import_contacts
                </span>
                Right to Information (RTI)</p>
        </div>
        <div class="body">
            <p style="font-size: 16px;">The Right to Information (RTI) Act grants individuals the right to access information held by public authorities, promoting transparency and accountability in governance. At the Crime Report Portal, we are committed to upholding the principles of the RTI Act and facilitating the exercise of this right.</p>
            <p style="font-size: 16px;">If you require information related to crime reports or any other details held by the Crime Report Portal, you have the right to file an RTI request. We have designated a Public Information Officer (PIO) to handle RTI requests and ensure timely responses.</p>
            <p style="font-size: 16px;">To file an RTI request, please address your request to the PIO and provide specific details about the information you are seeking. You may submit your request electronically or by post, along with the required RTI fee, if applicable.</p>
            <p style="font-size: 16px;">For assistance or further information regarding filing an RTI request, please contact our designated RTI Officer:</p>
            <p style="font-size: 16px;">Name: [RTI Officer's Name]<br>Email: [RTI Officer's Email]<br>Phone: [RTI Officer's Phone Number]<br>Address: [RTI Officer's Address]</p>
            <p style="color: green;">Exercise your right to information and engage with us transparently.</p>
        </div>
    </div>    

    <div class="cont" id="service">
        <div class="head">
            <p><span class="material-symbols-outlined">
                public
                </span>Services</p>
        </div>
        <div class="body">
            <ul style="font-size: 16px;">
                <li><strong>Crime Report Submission:</strong> Users can submit reports on various types of crimes, including theft, vandalism, assault, and more.</li>
                <li><strong>Complaint Tracking:</strong> Users can track the status of their complaints through the portal and receive updates on the progress of investigations or actions taken by authorities.</li>
                <li><strong>Assignment of Heads:</strong> Admins have the authority to assign designated heads to handle specific categories or areas of complaints.</li>
                <li><strong>User Registration and Authentication:</strong> Users can register accounts on the portal securely and authenticate their access.</li>
                <li><strong>Communication with Authorities:</strong> Users can communicate directly with designated heads or administrators regarding their complaints.</li>
                <li><strong>RTI (Right to Information) Services:</strong> Information and resources are provided for users to exercise their right to information under the RTI Act.</li>
                <li><strong>Analytics and Reporting:</strong> Admins have access to tools for generating reports and analytics on complaint data to identify trends and areas of concern.</li>
                <li><strong>User Support and Assistance:</strong> User support services are available to assist individuals with any issues or queries they may have.</li>
            </ul>
            <p style="color: green;">Explore our services and empower yourself to contribute to safer communities.</p>
        </div>
    </div>
    
    <div class="cont" id="contact">
        <div class="head">
            <p><span class="material-symbols-outlined">
                contact_support
                </span>Contact Us</p>
        </div>
        <div class="body">
            <p style="font-size: 16px;">If you have any questions, feedback, or concerns, please feel free to reach out to us. Our dedicated team is here to assist you.</p>
            <p style="font-size: 16px;"><strong>Email:</strong> contact@crimereportportal.com</p>
            <p style="font-size: 16px;"><strong>Phone:</strong> +123-456-7890</p>
            <p style="font-size: 16px;"><strong>Address:</strong> 123 Main Street, City, Country, ZIP</p>
            <p style="font-size: 16px;">Alternatively, you can use the contact form below to send us a message:</p>
            <!-- You can add your contact form code here -->
            <p style="color: green;">We value your feedback and look forward to hearing from you!</p>
        </div>
    </div>
    
    
    

    <footer style="color: white; background-color: #27334f;  display: grid; align-items: center; justify-content: center; font-size: 10px;">
        <p>©2024 Crime Report Portal. All Rights Reserved.</p>
    </footer>

    <a href="#" class="btn"><img src="./images/next-arrow.png" alt=""></a>
</body>
</html>