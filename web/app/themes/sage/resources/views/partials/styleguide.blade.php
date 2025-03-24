<section class="section content">
  <div class="container">
    <h1 class="h1">Style Guide</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet asperiores autem blanditiis cumque
      deserunt
      dolor dolore dolores eos eveniet exercitationem facere facilis fugit id illum impedit iure laborum modi molestias
      nostrum nulla officiis pariatur quae, quos reiciendis reprehenderit suscipit temporibus veniam voluptatem,
      voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores assumenda culpa, error in
      ipsam minima molestiae numquam odio officia! Adipisci architecto aut commodi cumque cupiditate delectus deleniti,
      dolorem dolores et fugiat impedit iure maxime non soluta tempora ullam voluptate.
      Atque nemo non quaerat quod totam.</p>
    <h2 class="h2">Heading 2</h2>
    <ul>
      <li>Lorem ipsum dolor.</li>
      <li>Lorem ipsum dolor.</li>
      <li>Lorem ipsum dolor.</li>
    </ul>
    <h3 class="h3">Heading 3</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nostrum.</p>
    <ol>
      <li>Lorem ipsum dolor sit.</li>
      <li>Lorem ipsum.</li>
      <li>Lorem ipsum dolor sit amet, consectetur.</li>
    </ol>
    <h4 class="h4">Heading 4</h4>
    <blockquote>
      This is a blockquote.
      <cite>John Doe</cite>
    </blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure molestiae mollitia necessitatibus placeat
      possimus,
      quasi quos tempore voluptatem! Porro, reprehenderit?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, fuga, velit.</p>
    <h4 class="h5">Heading 5</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet asperiores autem blanditiis cumque
      deserunt
      dolor dolore dolores eos eveniet exercitationem facere facilis fugit id illum impedit iure laborum modi molestias
      nostrum nulla officiis pariatur quae, quos reiciendis reprehenderit suscipit temporibus veniam voluptatem,
      voluptatum.
      Atque nemo non quaerat quod totam.</p>
  </div>
</section>

<section class="section content">
  <div class="container">
    <h2 class="h2">Buttons</h2>
    <a href="#" class="btn btn--primary">Primary</a>
    <a href="#" class="btn btn--secondary">Secondary</a>
    <a href="#" class="btn btn--outline-primary">Outline Primary</a>
    <a href="#" class="btn btn--outline-secondary">Outline Secondary</a>
    <a href="#" class="btn btn--link">Link Btn</a>
  </div>
</section>

<section class="section content">
  <div class="container">
    <h2 class="h2">Forms</h2>
    <form action="" class="form">
      <div class="form-control">
        <label for="simple-input">Simple input</label>
        <input type="text" name="simple-input" id="simple-input" placeholder="Simple input"/>
      </div>
      <div class="form-control form-control--sm">
        <label for="simple-input-sm">Simple input</label>
        <input type="text" name="simple-input-sm" id="simple-input-sm" placeholder="Simple input sm"/>
      </div>
      <div class="form-control form-control--state-error">
        <label for="simple-error-input">Simple input with error</label>
        <input type="text" name="simple-error-input" id="simple-error-input" placeholder="Simple error input"/>
        <span class="form-control__message">Error message</span>
      </div>
      <div class="form-control form-control--state-success">
        <label for="simple-success-input">Simple success error</label>
        <input type="text" name="simple-success-input" id="simple-success-input" placeholder="Simple success input"/>
        <span class="form-control__message">Success message</span>
      </div>
    </form>
  </div>
</section>

<section class="section content">
  <div class="container">
    <x-feedback-dialog :model="new \App\DTO\FeedbackDialogDTO('Открыть диалог','Test','b53e7db','btn btn--primary','from--feedback')"/>
    <h2 class="h2">Vue</h2>
    <div id="vue-example"></div>
    <h2 class="h2">Fancyapps</h2>
    <a data-src="https://lipsum.app/id/1/1376x774" data-fancybox="gallery-example" class="example_class">
      <img src="https://lipsum.app/id/1/344x194" class="example_class" />
    </a>
    <a data-src="https://lipsum.app/id/2/1376x774" data-fancybox="gallery-example" class="example_class">
      <img src="https://lipsum.app/id/2/344x194" class="example_class" />
    </a>
    <div data-carousel="no-nav" class="example_class" class="f-carousel example_class">
      <div class="f-carousel__viewport">
        <div class="f-carousel__track">
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/1/256x144">
            <img data-lazy-src="https://lipsum.app/id/1/688x387" class="example_class">
          </div>
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/2/256x144">
            <img data-lazy-src="https://lipsum.app/id/2/688x387" class="example_class">
          </div>
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/3/256x144">
            <img data-lazy-src="https://lipsum.app/id/3/688x387" class="example_class">
          </div>
        </div>
      </div>
    </div>
    <div data-carousel="thumbs autoplay" data-autoplay="1500" class="f-carousel example_class">
      <div class="f-carousel__viewport">
        <div class="f-carousel__track">
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/1/256x144">
            <img data-lazy-src="https://lipsum.app/id/1/688x387" class="example_class">
          </div>
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/2/256x144">
            <img data-lazy-src="https://lipsum.app/id/2/688x387" class="example_class">
          </div>
          <div class="f-carousel__slide example_class" data-thumb-src="https://lipsum.app/id/3/256x144">
            <img data-lazy-src="https://lipsum.app/id/3/688x387" class="example_class">
          </div>
        </div>
      </div>
    </div>
    <div data-panzoom class="example_class">
      <img src="https://lipsum.app/id/1/688x387" class="example_class"/>
    </div>
  </div>
</section>

