<?php
// index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>KAVITHA G | Portfolio</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #121212, #1f1b24);
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
    }

    nav {
      position: fixed;
      top: 30px;
      right: 50px;
      z-index: 1000;
    }

    nav a {
      color: #bb86fc;
      text-decoration: none;
      margin-left: 30px;
      font-weight: bold;
      position: relative;
      font-size: 1.05em;
      transition: color 0.3s;
    }

    nav a::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #03dac5;
      transition: 0.3s;
    }

    nav a:hover {
      color: #03dac5;
    }

    nav a:hover::after {
      width: 100%;
    }

    header {
      text-align: center;
      padding: 120px 20px 40px;
      animation: fadeIn 2s ease forwards;
    }

    header h1 {
      font-size: 3.5em;
      letter-spacing: 3px;
      color: #03dac5;
      margin: 0;
    }

    header p {
      font-size: 1.3em;
      max-width: 600px;
      margin: 30px auto 0;
      line-height: 1.6em;
      color: #ccc;
    }

    .circle-img {
      width: 160px;
      height: 160px;
      border-radius: 50%;
      border: 3px solid #bb86fc;
      margin: 40px auto 0;
      background: url('profile.png') center/cover no-repeat; /* ✅ Your image here */
      box-shadow: 0 0 20px rgba(3, 218, 197, 0.5);
      animation: fadeIn 1.5s ease 1s forwards;
    }

    section {
      max-width: 1100px;
      margin: 100px auto;
      padding: 0 30px;
      opacity: 0;
      animation: fadeInUp 1s ease forwards;
    }

    section:nth-of-type(1) { animation-delay: 0.8s; }
    section:nth-of-type(2) { animation-delay: 1.3s; }
    section:nth-of-type(3) { animation-delay: 1.8s; }
    section:nth-of-type(4) { animation-delay: 2.3s; }

    section h2 {
      color: #03dac5;
      border-bottom: 3px solid #bb86fc;
      padding-bottom: 12px;
      margin-bottom: 30px;
      font-size: 2em;
    }

    .about-text {
      background: rgba(255, 255, 255, 0.02);
      border-left: 4px solid #03dac5;
      padding: 25px 30px;
      border-radius: 8px;
      line-height: 1.8em;
      color: #ddd;
      font-size: 1.05em;
      position: relative;
      overflow: hidden;
    }

    .about-text::before {
      content: "❝";
      position: absolute;
      top: -20px;
      left: 10px;
      font-size: 5em;
      color: #03dac57e;
    }

    .about-text::after {
      content: "❞";
      position: absolute;
      bottom: -20px;
      right: 10px;
      font-size: 5em;
      color: #03dac57e;
    }

    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .project-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid #333;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      display: flex;
      flex-direction: column;
    }

    .project-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(3, 218, 197, 0.2);
    }

    .project-image {
      width: 100%;
      height: 160px;
      background: url('https://via.placeholder.com/400x160') center/cover no-repeat;
    }

    .project-content {
      padding: 20px;
    }

    .project-content h3 {
      color: #03dac5;
      margin: 0 0 10px;
    }

    .project-content p {
      color: #ccc;
      line-height: 1.5em;
      font-size: 0.95em;
    }

    /* ✅ Timeline Styles */
    .timeline {
      position: relative;
      margin: 40px 0;
      padding-left: 40px;
      border-left: 3px solid #03dac5;
    }

    .timeline-item {
      position: relative;
      margin-bottom: 40px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.8s ease forwards;
    }

    .timeline-item:nth-child(1) { animation-delay: 0.2s; }
    .timeline-item:nth-child(2) { animation-delay: 0.4s; }
    .timeline-item:nth-child(3) { animation-delay: 0.6s; }
    .timeline-item:nth-child(4) { animation-delay: 0.8s; }
    .timeline-item:nth-child(5) { animation-delay: 1s; }
    .timeline-item:nth-child(6) { animation-delay: 1.2s; }
    .timeline-item:nth-child(7) { animation-delay: 1.4s; }

    .timeline-date {
      position: absolute;
      left: -150px;
      top: 0;
      width: 140px;
      text-align: right;
      font-size: 0.95em;
      color: #bb86fc;
    }

    .timeline-content {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid #333;
      padding: 20px;
      border-radius: 8px;
    }

    .timeline-content h3 {
      margin: 0 0 8px;
      color: #03dac5;
    }

    .timeline-content p {
      margin: 0;
      font-size: 0.95em;
      color: #ccc;
    }

    footer {
      text-align: center;
      padding: 30px 20px;
      border-top: 1px solid #333;
      margin-top: 60px;
      font-size: 0.9em;
      color: #777;
      opacity: 0;
      animation: fadeIn 1s ease forwards;
      animation-delay: 2.8s;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(40px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .social-links {
  margin-top: 20px;
}

.social-links a {
  display: inline-block;
  margin-right: 15px;
  color: #bb86fc;
  transition: transform 0.3s, color 0.3s;
}

.social-links a:hover {
  color: #03dac5;
  transform: translateY(-4px);
}

.social-links svg {
  vertical-align: middle;
  width: 28px;
  height: 28px;
  fill: currentColor;
}

  </style>
</head>
<body>
  <nav>
    <a href="#about">About</a>
    <a href="#projects">Projects</a>
    <a href="#experience">Experience</a>
    <a href="#contact">Contact</a>
  </nav>

  <header>
    <h1>KAVITHA G</h1>
    <div class="circle-img"></div>
    <p>Empowering minds through knowledge,<br>Shaping futures through skill.</p>
  </header>

  <section id="about">
    <h2>About</h2>
    <div class="about-text">
      Managing Director and Trainer at ASK – Academy of Skills and Knowledge, with over 20 years of experience in education, tech training, and academic leadership. I’ve taught everything from Python to psychology—sometimes both in the same day—and mentored students across disciplines with a smile and a meticulously color-coded planner.
      <br><br>
      Armed with advanced degrees and a research portfolio that includes cloud computing, sentiment analysis, and data privacy, I bring both head and heart to the classroom. Whether I’m guiding internship projects or delivering motivational sessions, my goal is simple: make learning engaging, purposeful, and just structured enough to keep things interesting.
      <br><br>
      Because great education isn’t just about curriculum—it’s about connection, curiosity, and knowing which tab in Excel actually does the magic.
    </div>
  </section>

  <section id="projects">
    <h2>Projects</h2>
    <div class="projects-grid">
      <div class="project-card">
        <div class="project-image" style="background: url('cloud.jpg') center/cover no-repeat;"></div>
        <div class="project-content">
          <h3>Cloud Computing Framework</h3>
          <p>Developed a cloud architecture for educational deployment, focusing on scalable e-learning systems.</p>
        </div>
      </div>
      <div class="project-card">
        <div class="project-image" style="background: url('sentiment.png') center/cover no-repeat;"></div>
        <div class="project-content">
          <h3>Sentiment Analysis Tool</h3>
          <p>Created a sentiment analysis model to study student feedback and improve training modules.</p>
        </div>
      </div>
      <div class="project-card">
        <div class="project-image" style="background: url('data-privacy.jpg') center/cover no-repeat;"></div>
        <div class="project-content">
          <h3>Data Privacy Research</h3>
          <p>Published research on data privacy techniques for academic institutions transitioning to cloud storage.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="experience">
    <h2>Experience</h2>
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-date">March 2025 – Present</div>
        <div class="timeline-content">
          <h3>Managing Director & Training Head</h3>
          <p>Academy of Skills & Knowledge, Ramanathapuram</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Nov 2024 – march 2025</div>
        <div class="timeline-content">
          <h3>Training Head & Python Developer</h3>
          <p>Plan Point Support Services, Ramanathapuram</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Feb 2021 – Jul 2024</div>
        <div class="timeline-content">
          <h3>Asst. Professor (Computer Science & Psychology)</h3>
          <p>Mohamed Sathak Hamid College of Arts and Science for Women</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">May 2014 – Jan 2021</div>
        <div class="timeline-content">
          <h3>Asst. Professor in Perspective Education (Psychology)</h3>
          <p>Puratchi Thalaivar Dr.MGR College of Education</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Jun 2013 – Apr 2014</div>
        <div class="timeline-content">
          <h3>Computer Teacher</h3>
          <p>Puratchi Thalaivar Dr.MGR Matric. Hr. Sec. School</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Aug 2004 – Jun 2013</div>
        <div class="timeline-content">
          <h3>Senior Faculty / Administrative Coordinator</h3>
          <p>SITECH (Sathak Institute of Technology)</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Jul 2002 – Jul 2004</div>
        <div class="timeline-content">
          <h3>Teacher</h3>
          <p>Arabi Oliyullah High School</p>
        </div>
      </div>
      <div class="timeline-item">
        <div class="timeline-date">Jun 2001 – Jun 2002</div>
        <div class="timeline-content">
          <h3>Faculty</h3>
          <p>Computer Software College</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
  <h2>Contact</h2>
  <div class="contact-card">
    <p><strong>📧 Mail:</strong> <a href="mailto:contact@askgrove.in">contact@askgrove.in</a></p>
    <p><strong>🌐 Website:</strong> <a href="https://askgrove.in" target="_blank">askgrove.in</a></p>
    <p><strong>📞 Mobile:</strong> (+91) 95788 23663, 90251 07080</p>
    <p><strong>📍 Address:</strong> 1/811 Jothi Nagar,<br>
      Sivagnanapuram, Collectorate-post,<br>
      Ramanathapuram – 623503
    </p>
    <div class="social-links">
      <a href="https://www.bing.com/ck/a?!&&p=90f52f387c59a416433c8371819afe551edffa1454db08b85fe1a02682bbba2bJmltdHM9MTc1MjUzNzYwMA&ptn=3&ver=2&hsh=4&fclid=17a0adbc-e347-6b56-3019-bb95e2386afd&psq=askgrove&u=a1aHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2ZlZWQvdXBkYXRlL3VybjpsaTphY3Rpdml0eTo3MzQ2MDA3OTM4Njg5Mzc2MjU3Lw&ntb=1" target="_blank" title="LinkedIn">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
          <path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM0 8h5V24H0V8zm7.5 0H12v2.5h.07c.5-1 1.75-2.5 4.43-2.5 4.73 0 5.6 3.12 5.6 7.2V24h-5V15c0-2.16-.04-4.93-3-4.93-3 0-3.46 2.35-3.46 4.78V24H7.5V8z"/>
        </svg>
      </a>
      <a href="https://www.facebook.com" target="_blank" title="Facebook">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
          <path d="M22 12a10 10 0 1 0-11.6 9.87v-7h-2v-2.87h2v-2.2c0-2 1.2-3.1 3-3.1.87 0 1.8.15 1.8.15v2h-1c-1 0-1.3.63-1.3 1.27v1.88h2.2L15 15.87h-2v7A10 10 0 0 0 22 12"/>
        </svg>
      </a>
      <a href="https://www.instagram.com" target="_blank" title="Instagram">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
          <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-2.75a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5z"/>
        </svg>
      </a>
      <a href="https://wa.me/919578823663" target="_blank" title="WhatsApp">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
          <path d="M20 4a10 10 0 0 0-17 7.53A10 10 0 0 0 4 19l-1 4 4-1a10 10 0 0 0 5 1c5.52 0 10-4.48 10-10a9.94 9.94 0 0 0-2-6zm-8 16a8 8 0 0 1-4.09-1.11l-.29-.17-2.41.61.64-2.35-.19-.31A8 8 0 1 1 12 20zm4.36-5.64-.95-.47c-.26-.13-.45-.19-.64.1l-.47.62c-.19.25-.34.27-.63.14a6.52 6.52 0 0 1-3.2-3.2c-.14-.29-.11-.44.14-.63l.62-.47c.3-.19.23-.38.1-.64l-.47-.95c-.24-.48-.4-.47-.69-.47h-.59c-.25 0-.51.07-.77.32a2.56 2.56 0 0 0-.82 1.92c0 1.12.7 2.17 1.53 3.09.94 1.02 2.18 1.75 3.36 2.12.35.12.66.23.95.23a2.56 2.56 0 0 0 1.87-.82c.25-.26.32-.52.32-.77v-.59c0-.29.01-.45-.47-.69z"/>
        </svg>
      </a>
    </div>
  </div>
</section>

  <footer>
    &copy; <?php echo date("Y"); ?> By Muraleeshwar. All rights reserved @ WizardHub.
  </footer>
</body>
</html>
