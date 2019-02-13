package showboard.squares;

import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import showboard.ISquare;


public class GateO implements ISquare {

	protected Image[] images;
	
	public GateO() throws IOException {
		images = new Image[] {ImageIO.read(new File("../sprites/gate_open.png"))};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}