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
    .contact-card {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid #333;
  border-left: 4px solid #03dac5;
  padding: 30px;
  border-radius: 8px;
  line-height: 1.7em;
  color: #ddd;
  font-size: 1.05em;
  animation: fadeInUp 1s ease forwards;
}

.contact-card p {
  margin: 10px 0;
}

.contact-card a {
  color: #03dac5;
  text-decoration: none;
}

.contact-card a:hover {
  text-decoration: underline;
}

.social-links {
  margin-top: 20px;
}

.social-links a {
  display: inline-block;
  margin-right: 15px;
  font-size: 1.8em;
  transition: transform 0.3s, color 0.3s;
  color: #bb86fc;
  text-decoration: none;
}

.social-links a:hover {
  color: #03dac5;
  transform: translateY(-4px);
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
        <div class="project-image" style="background: url('images/cloud.jpg') center/cover no-repeat;"></div>
        <div class="project-content">
          <h3>Cloud Computing Framework</h3>
          <p>Developed a cloud architecture for educational deployment, focusing on scalable e-learning systems.</p>
        </div>
      </div>
      <div class="project-card">
        <div class="project-image" style="background: url('images/sentiment.png') center/cover no-repeat;"></div>
        <div class="project-content">
          <h3>Sentiment Analysis Tool</h3>
          <p>Created a sentiment analysis model to study student feedback and improve training modules.</p>
        </div>
      </div>
      <div class="project-card">
        <div class="project-image" style="background: url('images/data-privacy.jpg') center/cover no-repeat;"></div>
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
    <p><strong>📅 From:</strong> May 1st Onwards – Academy of Skill & Knowledge</p>
    <p><strong>📧 Mail:</strong> <a href="mailto:contact@askgrove.in">contact@askgrove.in</a></p>
    <p><strong>🌐 Website:</strong> <a href="https://askgrove.in" target="_blank">askgrove.in</a></p>
    <p><strong>📞 Mobile:</strong> (+91) 95788 23663, 90251 07080</p>
    <p><strong>📍 Address:</strong> 1/811 Jothi Nagar,<br>
      Sivagnanapuram, Collectorate-post,<br>
      Ramanathapuram – 623503
    </p>
    <div class="social-links">
      <a href="https://www.linkedin.com" target="_blank" title="LinkedIn">🔗</a>
      <a href="https://www.facebook.com" target="_blank" title="Facebook">📘</a>
      <a href="https://www.instagram.com" target="_blank" title="Instagram">📸</a>
      <a href="https://wa.me/919578823663" target="_blank" title="WhatsApp">💬</a>
    </div>
  </div>
</section>


  <footer>
    &copy; <?php echo date("Y"); ?> By Muraleeshwar. All rights reserved @ WizardHub.
  </footer>
</body>
</html>
