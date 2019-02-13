package model.pawns;

import java.awt.Image;
import java.awt.Point;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import model.Direction;
import showboard.ISquare;
import showboard.squares.Unpassable;

public class Monster4 extends Mobile {
	
	public Monster4(Direction direction, Point position) throws IOException {
		super(direction, position, new Image[] {ImageIO.read(new File("../sprites/monster_4.png"))});
		this.nbrImages = 3;
	}
	
	public void move(Point p, ISquare[][] squares) {
		if (hasMoved > 0) {
			this.hasMoved--;
		} else {
			ISquare square = null;
			if (p.getX() > this.getX()) {
				square = squares[this.getX()+1][this.getY()];
				if (!(square instanceof Unpassable)) {
					this.moveRight();
				}
			}
			if (p.getX() < this.getX()) {
				square = squares[this.getX()-1][this.getY()];
				if (!(square instanceof Unpassable)) {
					this.moveLeft();
				}
			}
			if (p.getY() > this.getY()) {
				square = squares[this.getX()][this.getY()+1];
				if (!(square instanceof Unpassable)) {
					this.moveDown();
				}
			}
			if (p.getY() < this.getY()) {
				square = squares[this.getX()][this.getY()-1];
				if (!(square instanceof Unpassable)) {
					this.moveUp();
				}
			}
			this.hasMoved = 3;
		}
	}
}