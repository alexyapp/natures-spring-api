<div class="modal fade" id="timelineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 style="z-index: 1001;" class="modal-title" id="timelineModalLabel">WHERE IT BEGAN</h1>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        @php
            $events = [
              [
                'year' => '1991',
                'subtitle' => 'Birth of Philippine Spring Water Resources, Inc.',
                'content' => 'Nature\'s Spring responded to the demand for safe and affordable drinking water after Typhoon Ruping (with international name, Typhoon Mike) struck Cebu in 1990.',
                'placement' => 'left',
                'additional' => [
                  'subtitle' => 'Purified Drinking Water',
                  'content' => 'First Bottled Water Variant'
                ]
              ],
              [
                'year' => '1993',
                'subtitle' => 'Production of Customized Packaging and Toll Manufacturing',
                'content' => 'Customized Packaging Toll Manufacturing',
                'placement' => 'right'
              ],
              [
                'year' => '1997',
                'subtitle' => 'Distilled Drinking Water',
                'content' => 'Second Bottled Water Variant',
                'placement' => 'left'
              ],
              [
                'year' => '2004',
                'subtitle' => 'Bulacan and Cagayan de Oro Plant',
                'content' => 'First Plant Expansion',
                'placement' => 'right'
              ],
              [
                'year' => '2006',
                'subtitle' => 'Laguna Plant',
                'content' => 'Second Plant Expansion',
                'placement' => 'left'
              ],
              [
                'year' => '2009',
                'subtitle' => 'Bai Water',
                'content' => 'Bai Water, a Premium Distilled Drinking Water',
                'placement' => 'right'
              ],
              [
                'year' => '2010',
                'subtitle' => 'Davao Plant',
                'content' => 'Third Plant Expansion',
                'placement' => 'left'
              ],
              [
                'year' => '2011',
                'subtitle' => 'Water Up! Campaign',
                'content' => 'The campaign aims to heighten up the awareness on the importance of keeping our body hydrated',
                'placement' => 'right',
                'additional' => [
                  'subtitle' => 'ph9 Drinking Water',
                  'content' => 'Third Bottled Water Variant'
                ]
              ],
              [
                'year' => '2012',
                'subtitle' => 'Go Green Advocacy!',
                'content' => 'Nature\'s Spring reduces the plastic content of the current bottle by an average of 50% versus the previous bottle.',
                'placement' => 'left'
              ],
              [
                'year' => '2015',
                'subtitle' => 'Acquisition of Aseptic* Filling Machine',
                'content' => 'Krones Aseptic Filling Machine that is first in the Philippines, first in Asia and second in the world. *Aseptic means it is free from contamination caused by harmful bacteria, viruses, or other microorganisms.',
                'placement' => 'right',
                'additional' => [
                  'subtitle' => 'Launching of Nature\'s Spring Ice Tea'
                ]
              ],
              [
                'year' => '2016',
                'subtitle' => 'Launching of Nature\'s Spring Flavored Drinks',
                'content' => '25th year Anniversary',
                'placement' => 'left' 
              ]
            ];
        @endphp

        @foreach ($events as $event)
            <div class="d-flex">
                @if ($event['placement'] == 'left')
                    <div class="timeline-left pr-5 {{ $loop->last ? '' : 'pb-5' }}"> 
                      <div class="{{ isset($event['additional']) ? 'mb-3' : '' }}">
                          <div class="event-year">
                            <h5 class="font-weight-bold d-inline-block">{{ $event['year'] }}</h5>
                          </div>
                          <div class="event-subtitle">
                            <h6 class="font-weight-bold">{{ $event['subtitle'] }}</h6>
                          </div>
                          <div class="event-content">
                            <p style="font-size: 0.9rem;">{{ $event['content'] }}</p>
                          </div>
                      </div>

                      @if (isset($event['additional']))
                          <div class="additional">
                              <div class="event-subtitle">
                                <h6 class="font-weight-bold">{{ $event['additional']['subtitle'] }}</h6>
                              </div>
                              
                              @if (isset($event['additional']['content']))
                                <div class="event-content">
                                  <p style="font-size: 0.9rem;">{{ $event['additional']['content'] }}</p>
                                </div>
                              @endif
                          </div>
                      @endif
                    </div>
                @else
                    <div class="timeline-left"></div>
                @endif

                <div class="timeline-container">
                  <div class="position-relative h-100">
                    <div class="timeline h-100 position-absolute"></div>
                    <div class="timeline-point position-absolute"></div>
                  </div>
                </div>

                @if ($event['placement'] == 'right')
                    <div class="timeline-right pl-5 {{ $loop->last ? '' : 'pb-5' }}"> 
                      <div class="{{ isset($event['additional']) ? 'mb-3' : '' }}">
                        <div class="event-year">
                          <h5 class="font-weight-bold d-inline-block">{{ $event['year'] }}</h5>
                        </div>
                        <div class="event-subtitle">
                          <h6 class="font-weight-bold">{{ $event['subtitle'] }}</h6>
                        </div>
                        <div class="event-content">
                          <p style="font-size: 0.9rem;">{{ $event['content'] }}</p>
                        </div>
                      </div>

                      @if (isset($event['additional']))
                          <div class="additional">
                              <div class="event-subtitle">
                                <h6 class="font-weight-bold">{{ $event['additional']['subtitle'] }}</h6>
                              </div>
                              
                              @if (isset($event['additional']['content']))
                                <div class="event-content">
                                  <p style="font-size: 0.9rem;">{{ $event['additional']['content'] }}</p>
                                </div>
                              @endif
                          </div>
                      @endif
                    </div>
                @else
                    <div class="timeline-right"></div>
                @endif
            </div>
        @endforeach
      </div>
      <div class="modal-footer border-none justify-content-center p-0 border-0">
        <div class="timeline-back-to-top">
          <a class="timeline-back-to-top-button font-weight-normal text-white" href="#">Back to top</a>
        </div>
      </div>
    </div>
  </div>
</div>