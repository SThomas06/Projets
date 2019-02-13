package showboard.squares;

import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import showboard.ISquare;


public class GateC implements ISquare, Unpassable {

	protected Image[] images;
	
	public GateC() throws IOException {
		images = new Image[] {ImageIO.read(new File("../sprites/gate_closed.png"))};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}