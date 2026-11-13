# 802.11 Wireless Security & Evil Twin Attack Assessment

## Overview
Controlled laboratory evaluation of WPA/WPA2 wireless network resilience against deauthentication floods, 4-way handshake interception, and captive-portal social engineering (Evil Twin) vectors using **Fluxion** and **Linset** within a Wifislax environment[cite: 57, 65].

## Lab Environment & Tools
- **OS & Platform:** Wifislax 12 (Virtualized environment with USB wireless adapter passthrough)[cite: 57, 66]
- **Wireless Interface:** Realtek RTL8187L (`wlan0` in monitor mode)[cite: 57, 66]
- **Frameworks & Utilities:** Fluxion 0.23, Linset 0.14, `mdk3` (deauthentication), `pyrit` (handshake verification), `dhcpd`, `fakedns`[cite: 57, 61, 64, 66, 69, 72]

## Assessment Workflow
1. **Spectrum Reconnaissance:** Scanned 2.4 GHz channels to identify target Access Points (`TestLab_AP`), operating channels, encryption ciphers (WPA/TKIP & WPA2/CCMP), and active client stations[cite: 58, 59, 60].
2. **4-Way Handshake Interception:** Executed targeted and broadcast deauthentication frames via `mdk3` to force client reconnection and capture EAPOL 4-way handshakes[cite: 62, 69, 70].
3. **Cryptographic Integrity Validation:** Verified captured `.cap` handshakes using `pyrit` to ensure valid cryptographic material before advancing to authentication testing[cite: 61, 69].
4. **Rogue AP & Captive Portal Simulation:** Deployed a cloned SSID alongside a local DHCP server (`192.168.1.0/24`) and DNS spoofing (`FakeDNS`) to redirect client HTTP requests to a captive verification portal[cite: 64, 72].

## Key Findings & Defensive Mitigation
- **Deauthentication Susceptibility:** Legacy management frames lack cryptographic protection, allowing forced disconnection of active stations[cite: 62, 70].
  - *Mitigation:* Enforce **802.11w (Protected Management Frames - PMF)** across enterprise and consumer access points[cite: 74].
- **Captive Portal Phishing Vector:** Users accustomed to browser login prompts may inadvertently submit pre-shared keys to rogue APs[cite: 63, 71].
  - *Mitigation:* Upgrade wireless authentication to **WPA3-SAE** (Simultaneous Authentication of Equals) or **WPA2/WPA3-Enterprise (802.1X)** with RADIUS server certificate validation, eliminating shared static passphrases[cite: 74].

# 802.11 Wireless Security & Evil Twin Attack Assessment

## Overview
Controlled laboratory evaluation of WPA/WPA2 wireless network resilience against deauthentication floods, 4-way handshake interception, and captive-portal social engineering (Evil Twin) vectors using **Fluxion** and **Linset** within a Wifislax environment.

## Lab Environment & Tools
- **OS & Platform:** Wifislax 12 (Virtualized environment with USB wireless adapter passthrough)
- **Wireless Interface:** Realtek RTL8187L (`wlan0` in monitor mode)
- **Frameworks & Utilities:** Fluxion 0.23, Linset 0.14, `mdk3` (deauthentication), `pyrit` (handshake verification), `dhcpd`, `fakedns`

## Attack & Mitigation Architecture

mermaid
flowchart TD
    A[1. Spectrum Reconnaissance<br/>2.4 GHz Monitor Mode] --> B[2. Deauthentication Flood<br/>mdk3 Frame Injection]
    B --> C[3. 4-Way Handshake Capture<br/>EAPOL Interception]
    C --> D[4. Cryptographic Verification<br/>pyrit .cap Validation]
    D --> E[5. Rogue AP & Captive Portal<br/>Cloned SSID + DHCP + FakeDNS]
    E -.->|Defense: 802.11w PMF| B
    E -.->|Defense: WPA3-SAE / 802.1X| E

---
*Disclaimer: Conducted strictly in an isolated academic lab against authorized test hardware. All network identifiers and MAC addresses in this documentation have been anonymized.*
