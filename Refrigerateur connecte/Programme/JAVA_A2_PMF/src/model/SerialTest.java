package model;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import gnu.io.CommPortIdentifier; 
import gnu.io.SerialPort;
import gnu.io.SerialPortEvent; 
import gnu.io.SerialPortEventListener; 
import java.util.Enumeration;

public class SerialTest extends assignData implements SerialPortEventListener {
	SerialPort serialPort;
        /** The port we're normally going to use. */
	private static final String PORT_NAMES[] = { 
		//	"/dev/tty.usbserial-A9007UX1", // Mac OS X
            //            "/dev/ttyACM0", // Raspberry Pi
		//	"/dev/ttyUSB0", // Linux
			"COM10", // Windows
	};
	/**
	* A BufferedReader which will be fed by a InputStreamReader 
	* converting the bytes into characters 
	* making the displayed results codepage independent
	*/
	private BufferedReader input;
	/** The output stream to the port */
	private static OutputStream output;
	/** Milliseconds to block while waiting for port open */
	private static final int TIME_OUT = 2000;
	/** Default bits per second for COM port. */
	private static final int DATA_RATE = 9600;

	public void initialize() {
                // the next line is for Raspberry Pi and 
                // gets us into the while loop and was suggested here was suggested http://www.raspberrypi.org/phpBB3/viewtopic.php?f=81&t=32186
                //System.setProperty("gnu.io.rxtx.SerialPorts", "/dev/ttyACM0");

		CommPortIdentifier portId = null;
		Enumeration portEnum = CommPortIdentifier.getPortIdentifiers();

		//First, Find an instance of serial port as set in PORT_NAMES.
		while (portEnum.hasMoreElements()) {
			CommPortIdentifier currPortId = (CommPortIdentifier) portEnum.nextElement();
			for (String portName : PORT_NAMES) {
				if (currPortId.getName().equals(portName)) {
					portId = currPortId;
					break;
				}
			}
		}
		if (portId == null) {
			System.out.println("Could not find COM port.");
			return;
		}

		try {
			// open serial port, and use class name for the appName.
			serialPort = (SerialPort) portId.open(this.getClass().getName(),
					TIME_OUT);

			// set port parameters
			serialPort.setSerialPortParams(DATA_RATE,
					SerialPort.DATABITS_8,
					SerialPort.STOPBITS_1,
					SerialPort.PARITY_NONE);

			// open the streams
			input = new BufferedReader(new InputStreamReader(serialPort.getInputStream()));
			output = serialPort.getOutputStream();
			
			

			// add event listeners
			serialPort.addEventListener(this);
			serialPort.notifyOnDataAvailable(true);
		} catch (Exception e) {
			System.err.println(e.toString());
		}
	}

	/**
	 * This should be called when you stop using the port.
	 * This will prevent port locking on platforms like Linux.
	 */
	public synchronized void close() {
		if (serialPort != null) {
			serialPort.removeEventListener();
			serialPort.close();
			setHumidity_DHT(0);
			setTemperatureC_DHT(0);
			setTemperatureF_DHT(0);
			setHeat_indexC_DHT(0);
			setHeat_indexF_DHT(0);
			setTension_Mesuree_PT100(0);
			setResistance_exercee_PT100(0);
			setTemperature_mesureeK_PT100(0);
			setTemperature_mesureeC_PT100(0);
			setPoint_de_rosee(0);
			setConsigne(0);
			setPlageB(0);
			setPlageH(0);
			System.out.println("PORT CLOSED + RESET PARAMETERS");
		}
	}

	/**
	 * Handle an event on the serial port. Read the data and print it.
	 */
	public synchronized void serialEvent(SerialPortEvent oEvent) {
		if (oEvent.getEventType() == SerialPortEvent.DATA_AVAILABLE) {
			try {
				//LIT LA NOUVELLE LIGNE, PARSE LE TOUT POUR LES ATTRIBUER AUX VARIABLES CORRESPONDANTES ET PRINT LE TOUT
				String inputLine=input.readLine();
				assignData.parse(inputLine);
				/*System.out.println("\n#####################################################\nCONSIGNE READ "+ assignData.getConsigne() +
				"\nPLAGE_B READ " + assignData.getPlageB() +
				"\nPLAGE_H READ " + assignData.getPlageH() +
				"\nHUMIDITY READ " + assignData.getHumidity_DHT() +
				"\nHEAT_INDEX_C READ " + assignData.getHeat_indexC_DHT() +
				"\nHEAT_INDEX_F READ " + assignData.getHeat_indexF_DHT() +
				"\nTEMPERATURE_C_DHT READ " + assignData.getTemperatureC_DHT() +
				"\nTEMPERATURE_F_DHT READ " + assignData.getTemperatureF_DHT() +
				"\nPOINT_DE_ROSEE " + assignData.getPoint_de_rosee() +
				"\nRESISTANCE_EXERCEE_PT100 READ " + assignData.getResistance_exercee_PT100() +
				"\nTEMPERATURE_C_PT100 READ " + assignData.getTemperature_mesureeC_PT100() +
				"\nTEMPERATURE_F_PT100 READ " + assignData.getTemperature_mesureeK_PT100() +
				"\nTENSION_MESUREE_PT100 READ " + assignData.getTension_Mesuree_PT100()+
				"\n#####################################################\n"
				);*/
				System.out.println(inputLine); 
			} catch (Exception e) {
				System.err.println(e.toString());
			}
		}
		// Ignore all the other eventTypes, but you should consider the other ones.
	}

	//FONCTION CHANGEMENT CONSIGNE
	public synchronized static void changementConsigne(String consigne) {
			try{
				output.write(consigne.getBytes());
			} catch(Exception e) {
				System.err.println(e.toString());
			}
		}
	
}