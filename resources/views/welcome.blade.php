@include('layouts.header')
<body>
    <div class="container">
        <div class="content">
            <aside class="sidebar left">
                <div class="widget">
                    <h3>System Status</h3>
                    <div id="system-status"></div>
                </div>
                {{-- <div class="widget">
                    <h3>Encrypted Messages</h3>
                    <div id="encrypted-messages"></div>
                </div> --}}
            </aside>
            <main>
            @if ($errors->any())
                <div>
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="alertsuccess" class="alert alert-success" style="display: none;">
                Success sending request attack
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <form id="attack-form" action="{{ route('api.submit') }}" action="post" class="container">
            @csrf

            <div class="form-group">
                <label for="host">Host URL</label>
                <input type="url" placeholder="https://example.com" class="form-control" name="host" required>
            </div>

            <div class="form-group">
                <label for="method">Method</label>
                <select class="form-control" id="method7" name="method" required>
                    <optgroup label="Hypertext Transfer Protocol (HTTP/S)">
                        <option value="HTTP2-FLOODER">HTTP2-FLOODER</option>
                        <option value="HTTP1-FLOODER">HTTP1-FLOODER</option>
                        <option value="AI-BYPASS">AI-BYPASS</option>
                        <option value="HTTP-CLOUDFLARE">HTTP-CLOUDFLARE</option>
                        <option value="HTTP-KOREA">HTTP-KOREA</option>
                        <option value="HTTP-CHINA">HTTP-CHINA</option>
                        <option value="HTTP-ROSETTA">HTTP-ROSETTA</option>
                        <option value="CHINA-HK">CHINA-HK</option>
                        <option value="HTTP-TOR">HTTP-TOR</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="rmethod">Request Method</label>
                <input type="text" value="GET" class="form-control" name="rmethod" required>
            </div>

            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" value="GET" placeholder="set to default GET" class="form-control" name="header" required>
            </div>

            <div class="form-group">
                <label for="request">Request Count</label>
                <input type="number" placeholder="set between 1 to 50 per requests" class="form-control" name="request" required>
            </div>

            <div class="form-group">
                <label for="geo">Geo Location</label>
                <select class="form-control" type="text" id="geo" name="geo">
                    <option value="WORLDWIDE">WORLDWIDE</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">vietnam</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="CV">Cabo Verde</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, Democratic Republic of the</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="SZ">Eswatini</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GR">Greece</option>
                    <option value="GD">Grenada</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea (North)</option>
                    <option value="KR">Korea (South)</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Laos</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia</option>
                    <option value="MD">Moldova</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="MK">North Macedonia</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestine, State of</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russia</option>
                    <option value="RW">Rwanda</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syria</option>
                    <option value="TW">Taiwan</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TV">Tuvalu</option>
                    </select>
                </div>

                <input type="hidden" name="concurrents" id="concurrents">

                <div class="slider-container container">
                    <label for="number-slider">Set Concurrents:</label>
                    <input type="range" id="number-slider" min="1" max="37" value="1">
                    <span class="selected-value" id="selected-value">1</span>
                </div>

                <fieldset style="display: none;"> 
                    <legend>Concurrents:</legend>
                    <div id="radio-buttons-container"></div>
                </fieldset>

                <button type="submit" id="start-attack-btn" class="btn btn-success mt-3">
                    <i class="bi bi-rocket-fill"></i> START ATTACK
                </button>

            </form>
    
            </main>
            <aside class="sidebar right">
                <div class="widget">
                    <h3>Encrypted Messages</h3>
                    <div id="encrypted-messages"></div>
                </div>
            </aside>
        </div>
        @include('layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const slider = document.getElementById('number-slider');
        const selectedValueDisplay = document.getElementById('selected-value');
        const concurrents = document.getElementById('concurrents');
        const container = document.getElementById('radio-buttons-container');

        // Function to update the displayed value and generate radio buttons
        function updateDisplay(value) {
            selectedValueDisplay.textContent = value;

            concurrents.value = value;

            // Clear existing radio buttons
            container.innerHTML = '';

            // Create a radio button for the current slider value
            const label = document.createElement('label');
            label.textContent = value;

            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = 'number'; // All radio buttons will have the same name
            radio.value = value; // Value of the radio button

            // Append the radio button and label to the container
            label.prepend(radio); // Place radio button inside label
            container.appendChild(label);
        }

        // Initialize display
        updateDisplay(slider.value);

        // Event listener to update display when slider value changes
        slider.addEventListener('input', function () {
            updateDisplay(this.value);
        });
        
        $(document).ready(function() {
            $('#attack-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                var button = $('#start-attack-btn');

                // Change button to loading state
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                button.prop('disabled', true); // Disable the button

                // AJAX request
                $.ajax({
                    url: $(this).attr('action'), // Use the form action
                    method: 'POST',
                    data: $(this).serialize(), // Serialize the form data
                    success: function(response) {
                        document.getElementById('alertsuccess').style.display = 'block';
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText); // Log the error
                        alert('An error occurred: ' + xhr.responseText); // Show alert with error message
                    },
                    complete: function() {
                        // Revert button back to original state
                        button.html('<i class="bi bi-rocket-fill"></i> START ATTACK');
                        button.prop('disabled', false); // Enable the button again
                    }
                });
            });
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            initSystemStatus();
            initEncryptedMessages();
            initGlitchTerminal();
            initRealityDistortion();
            initGlitchLinks();
        });

        function initSystemStatus() {
            const statusElement = document.getElementById('system-status');
            const statuses = [
                'System online',
                'Firewall: Active',
                'Intrusion detected',
                'Reality matrix: Unstable',
                'Quantum fluctuations: Normal',
                'Dark web connection: Established',
                'Anomaly containment: 87% effective'
            ];

            function updateStatus() {
                const status = statuses[Math.floor(Math.random() * statuses.length)];
                const timestamp = new Date().toLocaleTimeString();
                statusElement.innerHTML += `<div>[${timestamp}] ${status}</div>`;
                statusElement.scrollTop = statusElement.scrollHeight;
            }

            setInterval(updateStatus, 3000);
            updateStatus();
        }

        function initEncryptedMessages() {
            const messagesElement = document.getElementById('encrypted-messages');
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}|:"<>?';

            function generateEncryptedMessage() {
                let result = '';
                const length = Math.floor(Math.random() * 20) + 10;
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * characters.length));
                }
                return result;
            }

            function addEncryptedMessage() {
                const message = generateEncryptedMessage();
                messagesElement.innerHTML += `<div>${message}</div>`;
                messagesElement.scrollTop = messagesElement.scrollHeight;
            }

            setInterval(addEncryptedMessage, 5000);
            addEncryptedMessage();
        }

        function initGlitchTerminal() {
            const terminalElement = document.getElementById('glitch-terminal');
            const commands = [
                'sudo hack reality',
                'ping void.null',
                'decrypt nightmare.exe',
                'cat /dev/consciousness',
                'ssh darkmatter@universe',
                'curl -s https://mind.upload',
                'grep -r "paranormal" /var/log/reality'
            ];

            function simulateTyping(text, element) {
                let i = 0;
                const interval = setInterval(() => {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i);
                        i++;
                    } else {
                        clearInterval(interval);
                        element.innerHTML += '<br>> ';
                    }
                }, 100);
            }

            function runCommand() {
                const command = commands[Math.floor(Math.random() * commands.length)];
                const commandElement = document.createElement('div');
                terminalElement.appendChild(commandElement);
                simulateTyping(command, commandElement);
            }

            setInterval(runCommand, 8000);
            runCommand();
        }

        function initRealityDistortion() {
            const distortionElement = document.getElementById('reality-distortion');
            const glitchPhrases = [
                'Reality shard detected',
                'Temporal anomaly increasing',
                'Quantum entanglement stabilized',
                'Parallel universe breach imminent',
                'Consciousness fragmentation at 63%',
                'Psychic interference detected',
                'Mandela effect probability: 89%'
            ];

            function addDistortionEffect() {
                const phrase = glitchPhrases[Math.floor(Math.random() * glitchPhrases.length)];
                const glitchElement = document.createElement('div');
                glitchElement.textContent = phrase;
                glitchElement.style.position = 'relative';
                glitchElement.style.animation = `glitch ${Math.random() * 2 + 1}s infinite`;
                distortionElement.appendChild(glitchElement);

                if (distortionElement.children.length > 5) {
                    distortionElement.removeChild(distortionElement.firstChild);
                }
            }

            setInterval(addDistortionEffect, 4000);
            addDistortionEffect();
        }

        function initGlitchLinks() {
            const links = document.querySelectorAll('.glitch-link');
            links.forEach(link => {
                link.setAttribute('data-text', link.textContent);
                link.addEventListener('mouseover', () => {
                    link.style.animation = 'glitch 0.3s infinite';
                });
                link.addEventListener('mouseout', () => {
                    link.style.animation = 'none';
                });
            });
        }

        document.addEventListener('mousemove', (e) => {
            const cursor = document.createElement('div');
            cursor.className = 'cursor-trail';
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
            document.body.appendChild(cursor);

            setTimeout(() => {
                cursor.remove();
            }, 1000);
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>