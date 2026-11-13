# Software-Defined Radio (SDR) – 1090 MHz ADS-B Telemetry Decoding

## Overview
Practical investigation of the physical and data-link layers of civil aviation **ADS-B (Automatic Dependent Surveillance–Broadcast)** signals operating at **1090 MHz**[cite: 46, 52]. Using low-cost SDR hardware, live aircraft transponder broadcasts were captured, demodulated, and mapped across Windows and macOS environments[cite: 46, 50, 51, 54].

## Hardware & Software Stack
- **Hardware:** RTL-SDR USB Dongle (Realtek RTL2832U + Rafael Micro R820T tuner)[cite: 48, 52]
- **Demodulation & Decoding:** `dump1090` (compiled from source on macOS via Homebrew and executed on Windows with WinUSB/Zadig drivers)[cite: 46, 47, 51, 52]
- **Visualization:** Virtual Radar Server (Windows) & `dump1090` local web interface (`localhost:8080` on macOS)[cite: 49, 54]

## Key Technical Observations & Security Implications
- **Real-Time Telemetry Extraction:** Decoded ICAO 24-bit hex addresses, flight callsigns, altitude, ground speed, heading, squawk codes, and GPS coordinates[cite: 48, 50, 53].
- **Lack of Cryptographic Authentication:** ADS-B broadcasts occur in clear text without cryptographic signing or encryption, exposing aviation tracking infrastructure to passive eavesdropping and potential RF spoofing/message injection threats.

*Disclaimer: Conducted passively in compliance with local radio reception regulations for public open-broadcast aviation signals.*