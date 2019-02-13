package model.pawns;

import java.awt.Image;
import java.awt.Point;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import model.Direction;
import showboard.ISquare;
import showboard.squares.Unpassable;

public class Monster2 extends Mobile {
	
	public Monster2(Direction direction, Point position) throws IOException {
		super(direction, position, new Image[] {ImageIO.read(new File("../sprites/monster_2.png"))});
		this.nbrImages = 3;
	}
	
	public void move(Point p, ISquare[][] squares) {
		if (hasMoved > 0) {
			this.hasMoved--;
		} else {
			if (p.getX() > this.getX() && !(squares[this.getX()+1][this.getY()] instanceof Unpassable)) {
				this.moveRight();
			} else if (p.getX() < this.getX() && !(squares[this.getX()-1][this.getY()] instanceof Unpassable)) {
				this.moveLeft();
			} else if (p.getY() > this.getY() && !(squares[this.getX()][this.getY()+1] instanceof Unpassable)) {
				this.moveDown();
			} else if (p.getY() < this.getY() && !(squares[this.getX()][this.getY()-1] instanceof Unpassable)) {
				this.moveUp();
			}
			this.hasMoved = 3;
		}
	}
}