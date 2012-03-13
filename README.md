# PHP MiniSpec

A quick spec framework inspired by Ruby's MiniTest::Spec.

## Things You Should Know About MiniSpec

* like Ruby MiniTest::Spec, but not an exhaustive port, just "inspired by"
* the original author wrote this to teach himself PHP via the CLI
* totally ignorant of the PHP package management ecosystem
* tests itself: check the spec dir
* sports a lovely DSL, enabled by functional programming techniques

## What It Looks Like

    describe("Spec", function() {
      function subject() {
        return new Spec("i return 5", function() {
          return 5;
        });
      }

      it("has a label", function() {
        expect(subject()->label)->toBe("i return 5");
      });

      it("is executable", function() {
        expect(subject()->execute())->toBe(5);
      });

      it("has a toString", function() {
        "coerce toString call".subject();
      });
    });

And you may notice that this spec is talking about specs. That's because...

## MiniSpec is specified with MiniSpec

As yet MiniSpec has no dependencies, but we still want to practice BDD. We achieve this by "writing the code we wish we had", and then making it work. It is trivial work at first, simply defining global methods and calling them in sequence.

But as the refactorings mount, the code starts to take shape (with high cohesion and low coupling, of course!) Soon, each new feature delivered is showing notable improvements to the spec system it itself runs: so meta!

To run the tests: clone the repo, enter its root directory, and execute:

    $ php spec.php

"Good" output is simple for now, but it'll sure blow up if it's bad!

## How Do I Use It?

### You probably shouldn't...

But if you really wanted to, you'd just include src/MiniSpec/autoload.php somewhere and go to town.

### Want better instructions than that?

Copy the files in src/MiniSpec to somewhere your project. Like, wherever you put 3rd party libraries to be included in your code (...seriously, I haven't read anything about PHP package managers yet). I favor [PROJECT_ROOT]/lib/MiniSpec.

Now create a spec_helper.php file in that spec dir, and use it to pull in MiniSpec and the files you wish to test.

    <?php
    
    require("lib/MiniSpec/autoload.php");
    require("your files here");
    
    ?>

Now make a spec file, include the helper, and start specifying!

    <?php // spec/truth_and_lies_spec.php
    
    require("spec/spec_helper.rb");
    
    describe("Truth and Lies", function() {
      it("holds that true is true", function() {
        expect(true)->toBe(true);
      });

      it("breaks when math breaks", function() {
        expect(function() {
          $badMath = 42/0;
        })->toRaise("something about NaN or something, idunno");
      });
    });
    
    ?>

MiniSpec makes use of register_shutdown_function to invoke itself at exit, so all the spec writer has to do is write those lovely specs!

Run it from the root

    $ php spec/truth_and_lies_spec.php

The framework picks up the specs and executes them for you, isn't that nice?

Check out the spec/ directory to see this setup in action, testing itself.

## Expectations

These are those fluent-sounding methods, like so

    expect(2+2)->toBe(4);
    expect(array(1, 2, 3))->toContain(2);

3 problems with expectations right now:

* they should return some kind of status instead of raising exceptions
* they should be trivially negate-able: toBe needs an easy notToBe
* they should have a trivial extension mechanism

## Output

Output is perhaps spotty at the moment, but a variety of formatting and output options should be easy to make pluggable. Ideally it supports everything from CI servers to generated web reports.

## Before/After

These don't exist yet.

## Let/Subject

These dont' exist yet.

## Visitors

Talk about how the DSL layer just builds an object model, but to do meaningful work we need Visitors to walk the object model. Spec runners and reporters are two separate examples of services that should be provided by a visitor. Even the DSL has one, but it is unique in that it creates the object graph as it walks it.

## Contributing

Fork and pull request. Just do it, this project doesn't even have a version yet. Hell, you're lucky it has a readme!
