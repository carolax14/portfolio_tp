<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2 class="text-uppercase">Contact</h2>
      <p></p>
    </div>

    <div class="row" data-aos="fade-in">
      <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Localisation:</h4>
            <p>97490 Saint-Denis, Réunion</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Adresse mail:</h4>
            <p>carole.hafizou@gmail.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Numéro de téléphone:</h4>
            <p>+262 692 ** ** **</p>
          </div>

          <iframe
            src="https://www.google.fr/maps/place/Bois+de+N%C3%A8fles+Sainte-Clotilde,+Sainte-Clotilde,+R%C3%A9union/@-20.9214234,55.4373972,13z/data=!3m1!4b1!4m5!3m4!1s0x21827fe62c00e6ff:0x2cf2258a2b29fa70!8m2!3d-20.9340583!4d55.4720861"
            frameborder="0"
            style="border: 0; width: 100%; height: 290px"
            allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form
          action="contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Votre nom</label>
              <input
                type="text"
                name="name"
                class="form-control"
                id="name"
                required />
            </div>
            <div class="form-group col-md-6">
              <label for="name">Votre adresse mail*</label>
              <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                required />
            </div>
          </div>
          <div class="form-group">
            <label for="name">Sujet*</label>
            <input
              type="text"
              class="form-control"
              name="subject"
              id="subject"
              required />
          </div>
          <div class="form-group">
            <label for="name">Votre message*</label>
            <textarea
              class="form-control"
              name="message"
              rows="10"
              required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">
              Votre message a bien était envoyé. Merci à vous!
            </div>
          </div>
          <div class="text-center">
            <button type="submit" name="envoyer">
              Envoyer un message
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>