package showboard.squares;

import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import showboard.ISquare;

public class Bone implements ISquare, Unpassable {
	protected Image[] images;
	
	public Bone() throws IOException {
		images = new Image[] {ImageIO.read(new File("../sprites/bone.png"))};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}