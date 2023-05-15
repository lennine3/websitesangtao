<section style="background-color: var(--main-color)" id="ServiceBenefits">
    <div class="container serviceBenefitContainer">
        <h2 class="serviceBenefitTitle titleText">
            {{ $benefitInfo->name }}<br>{{ $benefitInfo->sub_name }} </h2>
        <div class="row">
            @foreach ($benefitList as $item)
                <div class="col-lg-4 col-md-6 serviceBenefitMobileBox">
                    <div class="serviceBenefitContain">
                        <h3 class="serviceBenefitSubTitle"> {{ $item->title }} </h3>
                        <div class="serviceBenefitSubDesc descText">
                            {{ $item->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
