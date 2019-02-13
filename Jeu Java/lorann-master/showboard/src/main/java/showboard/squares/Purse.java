package showboard.squares;

import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import showboard.ISquare;


public class Purse implements ISquare {

	protected Image[] images;
	
	public Purse() throws IOException {
		images = new Image[] {ImageIO.read(new File("../sprites/purse.png"))};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}